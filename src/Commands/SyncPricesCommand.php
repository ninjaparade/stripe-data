<?php

namespace Ninjaparade\StripeData\Commands;

use Illuminate\Console\Command;
use Ninjaparade\StripeData\Data\Response\Prices\StripePriceData;
use Ninjaparade\StripeData\Models\StripePrice;
use Ninjaparade\StripeData\Stripe\StripeService;
use Stripe\Exception\ApiErrorException;
use Symfony\Component\Console\Helper\ProgressBar;

class SyncPricesCommand extends Command
{
    public $signature = 'stripe-data-sync:prices';

    public $description = 'Command description';

    protected ProgressBar $bar;

    public function __construct(protected StripeService $stripe)
    {
        parent::__construct();
    }

    /**
     * @throws ApiErrorException
     */
    public function handle(): int
    {
        $prices = $this->stripe->prices();

        $count = $prices->data->count();

        $this->bar = $this->output->createProgressBar($count);
        $this->info("Syncing $count records 🥷");

        $this->bar->start();

        $prices->data->each(function (StripePriceData $price) {

            StripePrice::query()
                ->updateOrCreate([
                    'stripe_id' => $price->stripe_id,
                ], $price
                    ->except('object')
                    ->except('stripe_id')
                    ->except('product')
                    ->toArray());
            $this->bar->advance();
        });

        $this->bar->finish();
        $this->info("Done Syncing $count records 🥷");

        return self::SUCCESS;
    }
}
