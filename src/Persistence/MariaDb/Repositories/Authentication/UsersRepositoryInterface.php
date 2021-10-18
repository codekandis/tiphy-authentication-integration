<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Persistence\MariaDb\Repositories\Authentication;

use CodeKandis\Persistence\MariaDb\FetchingResultFailedException;
use CodeKandis\Persistence\MariaDb\SettingFetchModeFailedException;
use CodeKandis\Persistence\MariaDb\StatementExecutionFailedException;
use CodeKandis\Persistence\MariaDb\StatementPreparationFailedException;
use CodeKandis\Persistence\MariaDb\TransactionCommitFailedException;
use CodeKandis\Persistence\MariaDb\TransactionRollbackFailedException;
use CodeKandis\Persistence\MariaDb\TransactionStartFailedException;
use CodeKandis\TiphyAuthenticationIntegration\Entities\UserEntityInterface;
use ReflectionException;

/**
 * Represents the interface of any users respository of any user entity.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
interface UsersRepositoryInterface
{
	/**
	 * Reads a user specified by its ID.
	 * @param UserEntityInterface $user The ID of the user.
	 * @return ?UserEntityInterface The user if it exists, otherwise null.
	 * @throws ReflectionException The entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readUserByKey( UserEntityInterface $user ): ?UserEntityInterface;
}
