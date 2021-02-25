<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Persistence\Repositories\Authentication;

use CodeKandis\Tiphy\Persistence\MariaDb\Repositories\AbstractRepository;
use CodeKandis\TiphyAuthenticationIntegration\Entities\Authentication\UserEntity;
use CodeKandis\TiphyAuthenticationIntegration\Entities\Authentication\UserEntityInterface;

/**
 * Represents an users repositories.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
class UsersRepository extends AbstractRepository implements UsersRepositoryInterface
{
	/**
	 * {@inheritDoc}
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

		$arguments = [
			'key' => $user->apiKey
		];

		return $this->asTransaction(
			function () use ( $query, $arguments ): ?UserEntityInterface
			{
				/** @var ?UserEntityInterface */
				return $this->databaseConnector->queryFirst( $query, $arguments, UserEntity::class );
			}
		);
	}
}
