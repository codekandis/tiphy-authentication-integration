<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Configurations;

use CodeKandis\Authentication\Configurations\SessionAuthenticatorConfigurationInterface;
use CodeKandis\Configurations\ConfigurationRegistryInterface as OriginConfigurationRegistryInterface;

/**
 * Represents the interface of any configuration registry providing a session authenticator configuration.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
interface SessionAuthenticatorConfigurationRegistryInterface extends OriginConfigurationRegistryInterface
{
	/**
	 * Gets the session authenticator configuration.
	 * @return ?SessionAuthenticatorConfigurationInterface The session authenticator configuration.
	 */
	public function getSessionAuthenticatorConfiguration(): ?SessionAuthenticatorConfigurationInterface;
}
