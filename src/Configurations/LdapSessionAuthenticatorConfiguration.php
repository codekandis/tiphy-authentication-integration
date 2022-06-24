<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Configurations;

use CodeKandis\Authentication\Configurations\LdapSessionAuthenticatorConfigurationInterface;
use CodeKandis\Configurations\AbstractConfiguration;

/**
 * Represents an LDAP session authenticator configuration.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
class LdapSessionAuthenticatorConfiguration extends AbstractConfiguration implements LdapSessionAuthenticatorConfigurationInterface
{
	use LdapAuthenticatorConfigurationTrait;
	use SessionAuthenticatorConfigurationTrait;
}
