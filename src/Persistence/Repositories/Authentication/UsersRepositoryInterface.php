<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Persistence\Repositories\Authentication;

use CodeKandis\Tiphy\Persistence\PersistenceException;
use CodeKandis\TiphyAuthenticationIntegration\Entities\Authentication\UserEntityInterface;

/**
 * Represents the interface of all users respositories.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
interface UsersRepositoryInterface
{
	/**
	 * Reads an user specified by its ID.
	 * @param UserEntityInterface $user The ID of the user.
	 * @return ?UserEntityInterface The user if it exist, null otherwise.
	 * @throws PersistenceException An error occurred during the query execution.
	 */
	public function readUserByKey( UserEntityInterface $user ): ?UserEntityInterface;
}
