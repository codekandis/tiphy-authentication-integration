<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Persistence\MariaDb\Repositories\Authentication;

use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMapper;
use CodeKandis\Persistence\MariaDb\Repositories\AbstractRepository;
use CodeKandis\TiphyAuthenticationIntegration\Entities\EntityPropertyMappings\UserEntityPropertyMappings;
use CodeKandis\TiphyAuthenticationIntegration\Entities\UserEntity;
use CodeKandis\TiphyAuthenticationIntegration\Entities\UserEntityInterface;

/**
 * Represents a repository for any user entity.
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

		$entityPropertyMapper = ( new EntityPropertyMapper(
			UserEntity::class,
			new UserEntityPropertyMappings()
		) );
		$mappedUser           = $entityPropertyMapper->mapToArray( $user );

		$arguments = [
			'key' => $mappedUser[ 'apiKey' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $entityPropertyMapper );
	}
}