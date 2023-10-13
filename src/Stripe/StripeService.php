<?php

namespace Ninjaparade\StripeData\Stripe;

use Ninjaparade\StripeData\Data\Config\StripeConfig;
use Ninjaparade\StripeData\Data\Response\StripeCustomerData;
use Stripe\Exception\ApiErrorException;
use Stripe\SearchResult;
use Stripe\StripeClient;

class StripeService
{
    public function __construct(protected StripeConfig $config)
    {
    }

    /**
     * Return a customer.
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

    /**
     * List customers.
     *
     *
     * @return \Spatie\LaravelData\CursorPaginatedDataCollection|\Spatie\LaravelData\DataCollection|\Spatie\LaravelData\PaginatedDataCollection(StripeCustomerData::class)
     *
     * @throws ApiErrorException
     */
    public function customers(array $parameters = [], int $limit = 100): \Spatie\LaravelData\PaginatedDataCollection|\Spatie\LaravelData\CursorPaginatedDataCollection|\Spatie\LaravelData\DataCollection
    {
        $customers = $this->client()->customers->all(
            array_merge($parameters, [
                'limit' => $limit,
            ])
        );

        return StripeCustomerData::collection(collect(data_get($customers->toArray(), 'data')));
    }

    /**
     * @throws ApiErrorException
     */
    public function customersSearch(string $query, array $parameters = []): SearchResult
    {
        return $this->client()->customers->search(
            array_merge($parameters, [
                'query' => $query,
            ])
        );
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
