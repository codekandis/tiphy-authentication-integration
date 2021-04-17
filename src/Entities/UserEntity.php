<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Entities;

use CodeKandis\Tiphy\Entities\AbstractEntity;

/**
 * Represents a user entity.
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
	 * @var bool
	 */
	public bool $isActive = false;

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

	/**
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 */
	public function setId( string $id ): void
	{
		$this->id = $id;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getIsActive(): bool
	{
		return $this->isActive;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setIsActive( bool $isActive ): void
	{
		$this->isActive = $isActive;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setName( string $name ): void
	{
		$this->name = $name;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setEmail( string $email ): void
	{
		$this->email = $email;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getApiKey(): string
	{
		return $this->apiKey;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setApiKey( string $apiKey ): void
	{
		$this->apiKey = $apiKey;
	}
}
