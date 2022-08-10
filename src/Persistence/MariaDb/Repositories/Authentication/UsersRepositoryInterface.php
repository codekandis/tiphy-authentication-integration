<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Persistence\MariaDb\Repositories\Authentication;

use CodeKandis\TiphyAuthenticationIntegration\Entities\UserEntityInterface;

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
	 */
	public function readUserByKey( UserEntityInterface $user ): ?UserEntityInterface;
}
