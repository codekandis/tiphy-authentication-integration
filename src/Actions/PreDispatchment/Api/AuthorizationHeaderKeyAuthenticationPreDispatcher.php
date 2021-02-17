<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Actions\PreDispatchment\Api;

use CodeKandis\Authentication\AuthorizationHeader\AuthorizationHeaderParser;
use CodeKandis\Authentication\AuthorizationHeader\ParsedAuthorizationHeaderInterface;
use CodeKandis\Authentication\KeyBasedClientCredentials;
use CodeKandis\Authentication\KeyBasedStatelessAuthenticator;
use CodeKandis\Authentication\RegisteredKeyBasedClient;
use CodeKandis\Tiphy\Actions\PreDispatchment\PreDispatcherInterface;
use CodeKandis\Tiphy\Actions\PreDispatchment\PreDispatchmentStateInterface;
use CodeKandis\TiphyAuthenticationIntegration\Entities\Authentication\UserEntity;
use CodeKandis\TiphyAuthenticationIntegration\Persistence\Repositories\Authentication\UsersRepositoryInterface;
use JsonException;

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
	 */
	private function getRegisteredClient( string $apiKey ): ?RegisteredKeyBasedClient
	{
		$registeredUser = $this->usersRepository->readUserByKey(
			UserEntity::fromArray(
				[
					'apiKey' => $apiKey
				]
			)
		);

		return null === $registeredUser
			? null
			: new RegisteredKeyBasedClient( '', $registeredUser->apiKey, (int) $registeredUser->isActive );
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
	 * @inheritDoc
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
