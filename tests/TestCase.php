<?php

namespace Ninjaparade\StripeData\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ninjaparade\StripeData\StripeDataServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Ninjaparade\\StripeData\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            StripeDataServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_stripe-data_table.php.stub';
        $migration->up();
        */
    }
}
