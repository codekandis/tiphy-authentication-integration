<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Actions\PreDispatchment\Api;

use CodeKandis\Authentication\AuthorizationHeader\AuthorizationHeaderParser;
use CodeKandis\Authentication\AuthorizationHeader\ParsedAuthorizationHeaderInterface;
use CodeKandis\Authentication\KeyBasedClientCredentials;
use CodeKandis\Authentication\KeyBasedStatelessAuthenticator;
use CodeKandis\Authentication\RegisteredKeyBasedClient;
use CodeKandis\Tiphy\Actions\PreDispatchment\PreDispatcherInterface;
use CodeKandis\Tiphy\Actions\PreDispatchment\PreDispatchmentStateInterface;
use CodeKandis\Tiphy\Persistence\MariaDb\FetchingResultFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\SettingFetchModeFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\StatementExecutionFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\StatementPreparationFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionCommitFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionRollbackFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionStartFailedException;
use CodeKandis\TiphyAuthenticationIntegration\Entities\Authentication\UserEntity;
use CodeKandis\TiphyAuthenticationIntegration\Entities\Authentication\UserEntityInterface;
use CodeKandis\TiphyAuthenticationIntegration\Persistence\Repositories\Authentication\UsersRepositoryInterface;
use JsonException;
use ReflectionException;

/**
 * Represents an authorization header key authentication pre-dispatcher.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
class AuthorizationHeaderKeyAuthenticationPreDispatcher implements PreDispatcherInterface
{
	/**
	 * Stores the users repository of the authentication pre-dispatcher.
	 * @var UsersRepositoryInterface
	 */
	private UsersRepositoryInterface $usersRepository;

	/**
	 * Constructor method.
	 * @param UsersRepositoryInterface $usersRepository The users repository of the authentication pre-dispatcher.
	 */
	public function __construct( UsersRepositoryInterface $usersRepository )
	{
		$this->usersRepository = $usersRepository;
	}

	/**
	 * Gets the authorization header.
	 * @return ?ParsedAuthorizationHeaderInterface The authorization header.
	 */
	private function getAuthorizationHeader(): ?ParsedAuthorizationHeaderInterface
	{
		return ( new AuthorizationHeaderParser() )
			->parse();
	}

	/**
	 * Gets the registered client matching the API key.
	 * @param string The API key sent by the client.
	 * @return ?RegisteredKeyBasedClient The registered client matching the API key.
	 * @throws ReflectionException An error occurred during an entity creation.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	private function getRegisteredClient( string $apiKey ): ?RegisteredKeyBasedClient
	{
		$registeredUser = $this->usersRepository->readUserByKey(
		/**
		 * @var UserEntityInterface
		 */
			UserEntity::fromArray(
				[
					'apiKey' => $apiKey
				]
			)
		);

		return null === $registeredUser
			? null
			: new RegisteredKeyBasedClient(
				'',
				$registeredUser->getApiKey(),
				(int) $registeredUser->getIsActive()
			);
	}

	/**
	 * Responds with a `401 Unauthorized`.
	 * @param PreDispatchmentStateInterface $dispatchmentState The state of the dispatchment.
	 * @throws JsonException An error occurred during the creation of the JSON response.
	 */
	private function respondUnauthorized( PreDispatchmentStateInterface $dispatchmentState ): void
	{
		$dispatchmentState->setPreventDispatchment( true );
		( new UnauthorizedAction() )
			->execute();
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException An error occurred during an entity creation.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 * @throws JsonException An error occurred during the creation of the JSON response.
	 */
	public function preDispatch( PreDispatchmentStateInterface $dispatchmentState ): void
	{
		$authorizationHeader = $this->getAuthorizationHeader();

		if ( null === $authorizationHeader || 'Key' !== $authorizationHeader->getType() )
		{
			$this->respondUnauthorized( $dispatchmentState );

			return;
		}

		$clientCredentials = new KeyBasedClientCredentials( $authorizationHeader->getValue() );
		$registeredClient  = $this->getRegisteredClient( $clientCredentials->getKeySha512() );
		$authenticator     = new KeyBasedStatelessAuthenticator();

		if ( null === $registeredClient
			 || false === $authenticator->requestPermission(
				[
					$registeredClient
				],
				$clientCredentials
			)
		)
		{
			$this->respondUnauthorized( $dispatchmentState );
		}
	}
}
