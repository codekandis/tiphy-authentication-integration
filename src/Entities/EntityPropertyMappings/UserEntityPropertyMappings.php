<?php declare( strict_types = 1 );
namespace CodeKandis\TiphyAuthenticationIntegration\Entities\EntityPropertyMappings;

use CodeKandis\Converters\BiDirectionalConverters\BoolToStringBiDirectionalConverter;
use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMapping;
use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMappings;

/**
 * Represents the entity property mappings of any user entity.
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
		parent::__construct(
			new EntityPropertyMapping( 'id', null ),
			new EntityPropertyMapping( 'isActive', new BoolToStringBiDirectionalConverter() ),
			new EntityPropertyMapping( 'name', null ),
			new EntityPropertyMapping( 'email', null ),
			new EntityPropertyMapping( 'apiKey', null )
		);
	}
}
