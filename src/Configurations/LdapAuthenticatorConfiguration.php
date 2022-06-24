<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Configurations;

use CodeKandis\Authentication\Configurations\LdapAuthenticatorConfigurationInterface;
use CodeKandis\Configurations\AbstractConfiguration;

/**
 * Represents an LDAP authenticator configuration.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
class LdapAuthenticatorConfiguration extends AbstractConfiguration implements LdapAuthenticatorConfigurationInterface
{
	use LdapAuthenticatorConfigurationTrait;
}
