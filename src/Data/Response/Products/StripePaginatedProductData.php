<?php

namespace Ninjaparade\StripeData\Data\Response\Products;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class StripePaginatedProductData extends Data
{
    public function __construct(
        public readonly bool $has_more,
        #[DataCollectionOf(StripeProductData::class)]
        public readonly ?DataCollection $data,
    ) {

    }
}
