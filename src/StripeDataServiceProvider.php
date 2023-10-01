<?php

namespace Ninjaparade\StripeData;

use Ninjaparade\StripeData\Commands\StripeDataCommand;
use Ninjaparade\StripeData\Data\Config\StripeConfig;
use Ninjaparade\StripeData\Stripe\StripeService;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class StripeDataServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('stripe-data')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_stripe_data_table')
            ->hasCommand(StripeDataCommand::class);
    }

    public function registeringPackage(): void
    {
        $this->app->singleton(
            StripeService::class,
            fn ($app) => new StripeService(
                config: StripeConfig::from(config('stripe-data.stripe'))
            )
        );

        $this->app->alias(StripeService::class, 'stripe');
    }
}
