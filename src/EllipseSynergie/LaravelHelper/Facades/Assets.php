<?php namespace EllipseSynergie\LaravelHelper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade for Assets
 *
 * @author Maxime Beaudoin <maxime.beaudoin@ellipse-synergie.com>
 */
class Assets extends Facade
{
	/**
	 * Get the registered component.
	 *
	 * @return object
	 */
	protected static function getFacadeAccessor(){ return 'assets'; }

}