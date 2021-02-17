<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Entities\Authentication;

use CodeKandis\Tiphy\Entities\AbstractEntity;

/**
 * Represents an users entity.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
class UserEntity extends AbstractEntity implements UserEntityInterface
{
	/**
	 * Stores the ID of the user.
	 * @var string
	 */
	public string $id = '';

	/**
	 * Stores whether the user is active.
	 * @var string
	 */
	public string $isActive = '';

	/**
	 * Stores the name of the user.
	 * @var string
	 */
	public string $name = '';

	/**
	 * Stores the e-mail of the user.
	 * @var string
	 */
	public string $email = '';

	/**
	 * Stores the API key of the user.
	 * @var string
	 */
	public string $apiKey = '';
}
