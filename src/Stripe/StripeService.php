<?php

namespace Ninjaparade\StripeData\Stripe;

use Ninjaparade\StripeData\Data\Config\StripeConfig;
use Ninjaparade\StripeData\Data\Response\StripeCustomerData;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;

class StripeService
{
    public function __construct(protected StripeConfig $config)
    {
    }

    /**
     * Retrieve a single customer.
     * https://stripe.com/docs/api/customers/retrieve.
     *
     * @throws ApiErrorException
     */
    public function customer(string $customer_id, array $params = []): StripeCustomerData
    {
        $customer = $this->client()->customers->retrieve(
            $customer_id,
            $params
        );

        return StripeCustomerData::from($customer->toArray());
    }

    public function getClient(): StripeClient
    {
        return $this->client();
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
