<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Configurations;

/**
 * Represents the trait of a session authenticator configuration.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
trait SessionAuthenticatorConfigurationTrait
{
	/**
	 * {@inheritDoc}
	 */
	public function getRegisteredClientSessionKey(): string
	{
		return $this->read( 'registeredClientSessionKey' );
	}
}
