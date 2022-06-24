<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Configurations;

use CodeKandis\Authentication\Configurations\LdapSessionAuthenticatorConfigurationInterface;

/**
 * Represents the trait to integrate an LDAP session authenticator configuration into a configuration registry.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
trait LdapSessionAuthenticatorConfigurationRegistryTrait
{
	/**
	 * Stores the LDAP session authenticator configuration.
	 * @var ?LdapSessionAuthenticatorConfigurationInterface
	 */
	private ?LdapSessionAuthenticatorConfigurationInterface $ldapSessionAuthenticatorConfiguration = null;

	/**
	 * {@inheritDoc}
	 */
	public function getLdapSessionAuthenticatorConfiguration(): ?LdapSessionAuthenticatorConfigurationInterface
	{
		return $this->ldapSessionAuthenticatorConfiguration;
	}
}
