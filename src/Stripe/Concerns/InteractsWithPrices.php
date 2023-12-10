<?php

namespace Ninjaparade\StripeData\Stripe\Concerns;

use Exception;
use Ninjaparade\StripeData\Data\Response\Prices\StripePaginatedPriceData;
use Ninjaparade\StripeData\Data\Response\Prices\StripePriceData;
use Stripe\Exception\ApiErrorException;

trait InteractsWithPrices
{
    /**
     * @throws Exception
     */
    public function price(string $price_id): StripePriceData
    {
        try {
            $product = $this->client()->prices->retrieve($price_id);
        } catch (ApiErrorException $e) {
            throw new Exception($e->getMessage());
        }

        return StripePriceData::from($product->toArray());
    }

    /**
     * @throws Exception
     */
    public function prices(array $parameters = [], int $limit = 100): StripePaginatedPriceData
    {
        try {
            $prices = $this->client()->prices->all(array_merge($parameters, [
                'limit' => $limit,
            ]));

        } catch (ApiErrorException $e) {
            throw new Exception($e->getMessage());
        }

        return StripePaginatedPriceData::from($prices->toArray());
    }
}
