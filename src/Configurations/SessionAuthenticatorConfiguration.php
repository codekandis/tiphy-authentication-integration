<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Configurations;

use CodeKandis\Authentication\Configurations\SessionAuthenticatorConfigurationInterface;
use CodeKandis\Configurations\AbstractConfiguration;

/**
 * Represents a session authenticator configuration.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
class SessionAuthenticatorConfiguration extends AbstractConfiguration implements SessionAuthenticatorConfigurationInterface
{
	use SessionAuthenticatorConfigurationTrait;
}
