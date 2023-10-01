# Stripe Data is a Laravel package that brings your apps Stripe Data into your own database.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ninjaparade/stripe-data.svg?style=flat-square)](https://packagist.org/packages/ninjaparade/stripe-data)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ninjaparade/stripe-data/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ninjaparade/stripe-data/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ninjaparade/stripe-data/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ninjaparade/stripe-data/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ninjaparade/stripe-data.svg?style=flat-square)](https://packagist.org/packages/ninjaparade/stripe-data)

## Installation

You can install the package via composer:

```bash
composer require ninjaparade/stripe-data
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="stripe-data-migrations"
php artisan migrate
```

Make sure your stripe environment variables are set, the `env` vars expected are as follows
```bash
env('STRIPE_KEY'),
env('STRIPE_SECRET'),
env('STRIPE_WEBHOOK_SECRET'),
env('STRIPE_API_VERSION', '2023-09-21'),
env('STRIPE_API_BASE', 'https://api.stripe.com'),
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="stripe-data-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="stripe-data-views"
```

## Usage

```php
return Redirect::to('https://www.youtube.com/watch?v=dQw4w9WgXcQ');
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

- [Ninjaparade](https://github.com/ninjaparade)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
