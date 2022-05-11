<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Configurations;

use CodeKandis\Authentication\Configurations\SessionAuthenticatorConfigurationInterface;

/**
 * Represents the trait to integrate a session authenticator configuration into a configuration registry.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
trait SessionAuthenticatorConfigurationRegistryTrait
{
	/**
	 * Stores the session authenticator configuration.
	 * @var ?SessionAuthenticatorConfigurationInterface
	 */
	private ?SessionAuthenticatorConfigurationInterface $sessionAuthenticatorConfiguration = null;

	/**
	 * {@inheritDoc}
	 */
	public function getSessionAuthenticatorConfiguration(): ?SessionAuthenticatorConfigurationInterface
	{
		return $this->sessionAuthenticatorConfiguration;
	}
}
