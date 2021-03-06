<?php namespace EllipseSynergie\LaravelHelper;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use EllipseSynergie\LaravelHelper\Helper\Ajax;
use EllipseSynergie\LaravelHelper\Helper\Assets;
use EllipseSynergie\LaravelHelper\Helper\AwsS3;
use EllipseSynergie\LaravelHelper\Helper\Str;
use EllipseSynergie\LaravelHelper\Helper\Javascript;

class LaravelHelperServiceProvider extends ServiceProvider
{

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
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAssets();
        $this->registerAjax();
        $this->registerAwsS3();
        $this->registerStr();
        $this->registerJavascript();
    }

    /**
     * Assets
     */
    public function registerAssets()
    {
        //Create the Assets object
        $this->app['assets'] = new Assets(Config::get('assets'), url() . DIRECTORY_SEPARATOR,
            Config::get('assets.basePath'));
    }

    /**
     * Ajax
     */
    public function registerAjax()
    {
        //Create the Ajax object
        $this->app['ajax'] = new Ajax();
    }

    /**
     * AwsS3
     */
    public function registerAwsS3()
    {
        //Create the permissions object in the application instance
        $this->app['awss3'] = new AwsS3 (
            Config::get('aws.s3.key'),
            Config::get('aws.s3.secret'),
            Config::get('aws.s3.bucket')
        );
    }

    /**
     * Str
     */
    public function registerStr()
    {
        //Create the Str object
        $this->app['str'] = new Str(Config::get('application.encoding'));

        \Str::macro('replaceAccents', function ($value) {
            return $this->app['str']->replaceAccents($value);
        });

        \Str::macro('arrayStripTags', function ($value) {
            return $this->app['str']->arrayStripTags($value);
        });
    }

    /**
     * Javascript
     */
    public function registerJavascript()
    {
        //Create the Ajax object
        $this->app['javascript'] = new Javascript(Config::get('javascript.js_namespace'));
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