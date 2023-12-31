<?php

namespace Ninjaparade\StripeData;

use Illuminate\Database\Eloquent\Relations\Relation;
use Ninjaparade\StripeData\Commands\SyncCustomersCommand;
use Ninjaparade\StripeData\Commands\SyncPricesCommand;
use Ninjaparade\StripeData\Commands\SyncProductsCommand;
use Ninjaparade\StripeData\Data\Config\StripeConfig;
use Ninjaparade\StripeData\Models\StripeCustomer;
use Ninjaparade\StripeData\Models\StripeProduct;
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
            //            ->hasViews()
            ->hasMigration('create_stripe_data_table')
            ->hasCommands(
                $this->getCommands()
            );

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

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return $this->app->runningInConsole() ?
        [
            SyncCustomersCommand::class,
            SyncProductsCommand::class,
            SyncPricesCommand::class,
        ] : [];
    }

    public function packageBooted()
    {
        parent::packageBooted();

        Relation::enforceMorphMap([
            'stripe_customer' => StripeCustomer::class,
            'stripe_product' => StripeProduct::class,
        ]);
    }
}
