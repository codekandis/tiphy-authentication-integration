<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Configurations;

use CodeKandis\Authentication\Configurations\LdapAuthenticatorConfigurationInterface;

/**
 * Represents the trait to integrate an LDAP authenticator configuration into a configuration registry.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
trait LdapAuthenticatorConfigurationRegistryTrait
{
	/**
	 * Stores the LDAP authenticator configuration.
	 * @var ?LdapAuthenticatorConfigurationInterface
	 */
	private ?LdapAuthenticatorConfigurationInterface $ldapAuthenticatorConfiguration = null;

	/**
	 * {@inheritDoc}
	 */
	public function getLdapAuthenticatorConfiguration(): ?LdapAuthenticatorConfigurationInterface
	{
		return $this->ldapAuthenticatorConfiguration;
	}
}
