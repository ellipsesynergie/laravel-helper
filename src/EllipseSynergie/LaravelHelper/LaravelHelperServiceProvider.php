<?php namespace EllipseSynergie\LaravelHelper;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use EllipseSynergie\LaravelHelper\Helper\Ajax;
use EllipseSynergie\LaravelHelper\Helper\Assets;
use EllipseSynergie\LaravelHelper\Helper\AwsS3;

class LaravelHelperServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('ellipsesynergie/laravel-helper');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//Load package config
		$this->app['config']->package('ellipsesynergie/laravel-helper', __DIR__.'/../../config');
		
		//Create the permissions object in the application instance		
		$this->app['awss3'] = new AwsS3 (
			Config::get('laravel-helper::aws.s3.key'),
			Config::get('laravel-helper::aws.s3.secret'),
			Config::get('laravel-helper::aws.s3.bucket')
		);
		
		//Create the Ajax object
		$this->app['ajax'] = new Ajax();
		
		//Create the Assets object
		$this->app['assets'] = new Assets(Config::get('laravel-helper::assets'), url() . DIRECTORY_SEPARATOR, Config::get('laravel-helper::assets.basePath'));
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}