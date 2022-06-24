<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Configurations;

use CodeKandis\Authentication\Configurations\LdapAuthenticatorConfigurationInterface;
use CodeKandis\Configurations\ConfigurationRegistryInterface as OriginConfigurationRegistryInterface;

/**
 * Represents the interface of any configuration registry providing an LDAP authenticator configuration.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
interface LdapAuthenticatorConfigurationRegistryInterface extends OriginConfigurationRegistryInterface
{
	/**
	 * Gets the LDAP authenticator configuration.
	 * @return ?LdapAuthenticatorConfigurationInterface The LDAP authenticator configuration.
	 */
	public function getLdapAuthenticatorConfiguration(): ?LdapAuthenticatorConfigurationInterface;
}
