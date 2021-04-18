<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Entities\EntityPropertyMappings;

use CodeKandis\Tiphy\Converters\TwoWaysConverters\StringToBoolConverter;
use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMapping;
use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMappings;

/**
 * Represents the entity property mappings of a user entity.
 * @package codekandis/tiphy-authentication-integration
 * @author Christian Ramelow <info@codekandis.net>
 */
class UserEntityPropertyMappings extends EntityPropertyMappings
{
	/**
	 * Constructor method.
	 */
	public function __construct()
	{
		$this->add(
			new EntityPropertyMapping( 'id', null ),
			new EntityPropertyMapping( 'isActive', new StringToBoolConverter() ),
			new EntityPropertyMapping( 'name', null ),
			new EntityPropertyMapping( 'email', null ),
			new EntityPropertyMapping( 'apiKey', null )
		);
	}
}
