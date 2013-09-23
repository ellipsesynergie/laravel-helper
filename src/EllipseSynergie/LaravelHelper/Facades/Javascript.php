<?php namespace EllipseSynergie\LaravelHelper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Facade for javascript
 *
 * @author Maxime Beaudoin <maxime.beaudoin@ellipse-synergie.com>
 */
class Javascript extends Facade
{
	/**
	 * Get the registered component.
	 *
	 * @return object
	 */
	protected static function getFacadeAccessor(){ return 'javascript'; }

}