<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Entities;

use CodeKandis\Entities\EntityInterface;

/**
 * Represents the interface of any user entity.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
interface UserEntityInterface extends EntityInterface
{
	/**
	 * Gets the ID of the user.
	 * @return string The ID of the user.
	 */
	public function getId(): string;

	/**
	 * Sets the ID of the user.
	 * @param string $id The ID of the user.
	 */
	public function setId( string $id ): void;

	/**
	 * Gets whether the user is active.
	 * @return bool True if the user is active, false otherwise.
	 */
	public function getIsActive(): bool;

	/**
	 * Sets whether the user is active.
	 * @param bool $isActive True if the user is active, false otherwise.
	 */
	public function setIsActive( bool $isActive ): void;

	/**
	 * Gets the name of the user.
	 * @return string The name of the user.
	 */
	public function getName(): string;

	/**
	 * Sets the name of the user.
	 * @param string $name The name of the user.
	 */
	public function setName( string $name ): void;

	/**
	 * Gets the e-mail of the user.
	 * @return string The e-mail of the user.
	 */
	public function getEmail(): string;

	/**
	 * Sets the e-mail of the user.
	 * @param string $email The e-mail of the user.
	 */
	public function setEmail( string $email ): void;

	/**
	 * Gets the API key of the user.
	 * @return string The API key of the user.
	 */
	public function getApiKey(): string;

	/**
	 * Sets the API key of the user.
	 * @param string $apiKey The API key of the user.
	 */
	public function setApiKey( string $apiKey ): void;
}
