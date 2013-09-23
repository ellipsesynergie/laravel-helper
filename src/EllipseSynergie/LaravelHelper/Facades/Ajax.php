<?php namespace EllipseSynergie\LaravelHelper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade for Ajax request
 *
 * @author Maxime Beaudoin <maxime.beaudoin@ellipse-synergie.com>
 */
class Ajax extends Facade
{
	/**
	 * Get the registered component.
	 *
	 * @return object
	 */
	protected static function getFacadeAccessor(){ return 'ajax'; }

}