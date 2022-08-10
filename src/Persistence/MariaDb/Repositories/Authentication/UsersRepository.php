<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Persistence\MariaDb\Repositories\Authentication;

use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMapper;
use CodeKandis\Persistence\FetchingResultFailedException;
use CodeKandis\Persistence\Repositories\AbstractRepository;
use CodeKandis\Persistence\SettingFetchModeFailedException;
use CodeKandis\Persistence\StatementExecutionFailedException;
use CodeKandis\Persistence\StatementPreparationFailedException;
use CodeKandis\Persistence\TransactionCommitFailedException;
use CodeKandis\Persistence\TransactionRollbackFailedException;
use CodeKandis\Persistence\TransactionStartFailedException;
use CodeKandis\TiphyAuthenticationIntegration\Entities\EntityPropertyMappings\UserEntityPropertyMappings;
use CodeKandis\TiphyAuthenticationIntegration\Entities\UserEntity;
use CodeKandis\TiphyAuthenticationIntegration\Entities\UserEntityInterface;
use ReflectionException;

/**
 * Represents a repository for any user entity.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
class UsersRepository extends AbstractRepository implements UsersRepositoryInterface
{
	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readUserByKey( UserEntityInterface $user ): ?UserEntityInterface
	{
		$query = <<< END
			SELECT
				`users`.`id`,
				`users`.`isActive`,
				`users`.`name`,
				`users`.`email`,
				`apiKeys`.`key` as `apiKey`
			FROM
				`users`
			JOIN
				`apiKeys`
			ON
				`apiKeys`.`userId` = `users`.`id`
				AND
				`apiKeys`.`key` = :key
			LIMIT
				0, 1;
		END;

		$entityPropertyMapper = ( new EntityPropertyMapper(
			UserEntity::class,
			new UserEntityPropertyMappings()
		) );
		$mappedUser           = $entityPropertyMapper->mapToArray( $user );

		$arguments = [
			'key' => $mappedUser[ 'apiKey' ]
		];

		return $this->persistenceConnector->queryFirst( $query, $arguments, $entityPropertyMapper );
	}
}
