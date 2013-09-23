# Laravel Helpers

This package contain some helper for assets, standardize ajax request, AwsS3 utilities and more. All helpers are framework agnostic, but we provide service provider and base resource files for Laravel.

### Status

[![Build Status](https://travis-ci.org/ellipsesynergie/laravel-helper.png?branch=master)](https://travis-ci.org/ellipsesynergie/laravel-helper)
[![Total Downloads](https://poser.pugx.org/ellipsesynergie/laravel-helper/downloads.png)](https://packagist.org/packages/ellipsesynergie/laravel-helper)
[![Latest Stable Version](https://poser.pugx.org/ellipsesynergie/laravel-helper/v/stable.png)](https://packagist.org/packages/ellipsesynergie/laravel-helper)

## Documentation

##Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `ellipsesynergie/laravel-helper`.

```javascript
{
    "require": {
        "ellipsesynergie/laravel-helper": "dev-master"
    }
}
```

Update your packages with `composer update` or install with `composer install`.

Once this operation completes, you need to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

```php
EllipseSynergie\LaravelHelper\LaravelHelperServiceProvider
```

##Configurations

To configure the package to meet your needs, you must publish the configuration in your application before you can modify them. Run this artisan command.

```bash
php artisan config:publish ellipsesynergie/laravel-helper
```