<?php

namespace Ninjaparade\StripeData\Stripe;

use Ninjaparade\StripeData\Data\Config\StripeConfig;
use Ninjaparade\StripeData\Stripe\Concerns\InteractsWithCustomers;
use Ninjaparade\StripeData\Stripe\Concerns\InteractsWithInvoices;
use Stripe\StripeClient;

class StripeService
{
    use InteractsWithCustomers;
    use InteractsWithInvoices;

    public function __construct(protected StripeConfig $config)
    {
    }

    protected function client(): StripeClient
    {
        return new StripeClient([
            'api_key' => $this->config->secret,
            'stripe_version' => $this->config->version,
            'api_base' => $this->config->api_base,
            'stripe_account' => $this->config->stripe_account,
            'client_id' => $this->config->client_id,
        ]);
    }
}
