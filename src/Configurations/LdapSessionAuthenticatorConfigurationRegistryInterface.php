<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Configurations;

use CodeKandis\Authentication\Configurations\LdapSessionAuthenticatorConfigurationInterface;
use CodeKandis\Configurations\ConfigurationRegistryInterface as OriginConfigurationRegistryInterface;

/**
 * Represents the interface of any configuration registry providing an LDAP session authenticator configuration.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
interface LdapSessionAuthenticatorConfigurationRegistryInterface extends OriginConfigurationRegistryInterface
{
	/**
	 * Gets the LDAP session authenticator configuration.
	 * @return ?LdapSessionAuthenticatorConfigurationInterface The LDAP session authenticator configuration.
	 */
	public function getLdapSessionAuthenticatorConfiguration(): ?LdapSessionAuthenticatorConfigurationInterface;
}
