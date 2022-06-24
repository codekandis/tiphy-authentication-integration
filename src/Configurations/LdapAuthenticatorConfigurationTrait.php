<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Configurations;

/**
 * Represents the trait of an LDAP authenticator configuration.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
trait LdapAuthenticatorConfigurationTrait
{
	/**
	 * {@inheritDoc}
	 */
	public function getPermittedLdapGroup(): ?string
	{
		return $this->read( 'permittedLdapGroup' );
	}
}
