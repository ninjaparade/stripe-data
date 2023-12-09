<?php

namespace Ninjaparade\StripeData\Commands;

use Illuminate\Console\Command;
use Ninjaparade\StripeData\Data\Response\Products\StripeProductData;
use Ninjaparade\StripeData\Models\StripeProduct;
use Ninjaparade\StripeData\Stripe\StripeService;
use Stripe\Exception\ApiErrorException;

class SyncProductsCommand extends Command
{
    public $signature = 'stripe-data-sync:products';

    public $description = 'Command description';

    protected \Symfony\Component\Console\Helper\ProgressBar $bar;

    public function __construct(protected StripeService $stripe)
    {
        parent::__construct();
    }

    /**
     * @throws ApiErrorException
     */
    public function handle(): int
    {
        $products = $this->stripe->products();

        $count = $products->data->count();

        $this->bar = $this->output->createProgressBar($count);
        $this->info("Syncing $count records 🥷");

        $this->bar->start();

        $products->data->each(function (StripeProductData $product) {
            StripeProduct::query()
                ->updateOrCreate([
                    'stripe_id' => $product->stripe_id,
                ], $product
                    ->except('object')
                    ->except('stripe_id')
                    ->toArray());
            $this->bar->advance();
        });

        $this->bar->finish();
        $this->info("Done Syncing $count records 🥷");

        return self::SUCCESS;
    }
}
