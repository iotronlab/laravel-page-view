
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# Laravel Model Client View Counting Made Easy

[![Latest Version on Packagist](https://img.shields.io/packagist/v/iotronlab/laravel-page-view.svg?style=flat-square)](https://packagist.org/packages/iotronlab/laravel-page-view)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/iotronlab/laravel-page-view/run-tests?label=tests)](https://github.com/iotronlab/laravel-page-view/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/iotronlab/laravel-page-view/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/iotronlab/laravel-page-view/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/iotronlab/laravel-page-view.svg?style=flat-square)](https://packagist.org/packages/iotronlab/laravel-page-view)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-page-view.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-page-view)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require iotronlab/laravel-page-view
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-page-view-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-page-view-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-page-view-views"
```

## Usage

```php
$laravelPageView = new Iotronlab\LaravelPageView();
echo $laravelPageView->echoPhrase('Hello, Iotronlab!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Krishanu](https://github.com/iotronlab)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
