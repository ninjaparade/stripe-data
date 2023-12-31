<?php

namespace Ninjaparade\StripeData\Commands;

use Illuminate\Console\Command;
use Ninjaparade\StripeData\Data\Response\Customers\StripeCustomerData;
use Ninjaparade\StripeData\Models\StripeCustomer;
use Ninjaparade\StripeData\Stripe\StripeService;
use Stripe\Exception\ApiErrorException;
use Symfony\Component\Console\Helper\ProgressBar;

class SyncCustomersCommand extends Command
{
    public $signature = 'stripe-data-sync:customers';

    public $description = 'Command description';

    protected ProgressBar $bar;

    public function __construct(protected StripeService $stripe)
    {
        parent::__construct();
    }

    /**
     * @throws ApiErrorException
     */
    public function handle(): void
    {
        $customers = $this->stripe->customers();

        $count = $customers->data->count();

        $this->bar = $this->output->createProgressBar($count);
        $this->info("Syncing $count records 🥷");

        $this->bar->start();

        $customers->data->each(function (StripeCustomerData $customer) {
            $data = $customer->except('stripe_id')->except('object')->toArray();
            StripeCustomer::query()
                ->updateOrCreate([
                    'stripe_id' => $customer->stripe_id,
                ], $data);
            $this->bar->advance();
        });

        $this->bar->finish();
        $this->info("Done Syncing $count records 🥷");
    }
}
