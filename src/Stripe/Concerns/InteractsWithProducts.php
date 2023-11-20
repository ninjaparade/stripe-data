<?php

namespace Ninjaparade\StripeData\Stripe\Concerns;

use Ninjaparade\StripeData\Data\Response\Products\StripePaginatedProductData;
use Ninjaparade\StripeData\Data\Response\Products\StripeProductData;
use Stripe\Exception\ApiErrorException;

trait InteractsWithProducts
{
    /**
     * @throws \Exception
     */
    public function product(string $product_id): StripeProductData
    {
        try {
            $product = $this->client()->products->retrieve($product_id);
        } catch (ApiErrorException $e) {
            throw new \Exception($e->getMessage());
        }

        return StripeProductData::from($product->toArray());
    }

    /**
     * @throws \Exception
     */
    public function products(array $parameters = [], int $limit = 100): StripePaginatedProductData
    {
        try {
            $products = $this->client()->products->all(array_merge($parameters, [
                'limit' => $limit,
            ]));
        } catch (ApiErrorException $e) {
            throw new \Exception($e->getMessage());
        }

        return StripePaginatedProductData::from($products->toArray());
    }
}
