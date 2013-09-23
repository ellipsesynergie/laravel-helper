<?php namespace EllipseSynergie\LaravelHelper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade for AwsS3
 *
 * @author Maxime Beaudoin <maxime.beaudoin@ellipse-synergie.com>
 */
class AwsS3 extends Facade
{
	/**
	 * Get the registered component.
	 *
	 * @return object
	 */
	protected static function getFacadeAccessor(){ return 'awss3'; }

}