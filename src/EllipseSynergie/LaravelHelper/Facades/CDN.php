<?php namespace EllipseSynergie\LaravelHelper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade for CDN
 *
 * @author Maxime Beaudoin <maxime.beaudoin@ellipse-synergie.com>
 */
class CDN extends Facade
{
	/**
	 * Get the registered component.
	 *
	 * @return object
	 */
	protected static function getFacadeAccessor(){ return 'CDN'; }

}