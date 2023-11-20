<?php

namespace Ninjaparade\StripeData\Stripe\Concerns;

use Ninjaparade\StripeData\Data\Response\Customers\StripeCustomerData;
use Ninjaparade\StripeData\Data\Response\Customers\StripePaginatedCustomerData;
use Stripe\Exception\ApiErrorException;
use Stripe\SearchResult;

trait InteractsWithCustomers
{
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
     * @throws ApiErrorException
     */
    public function customers(array $parameters = [], int $limit = 100): StripePaginatedCustomerData
    {
        $customers = $this->client()->customers->all(
            array_merge($parameters, [
                'limit' => $limit,
            ])
        );

        return StripePaginatedCustomerData::from($customers->toArray());
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
}
