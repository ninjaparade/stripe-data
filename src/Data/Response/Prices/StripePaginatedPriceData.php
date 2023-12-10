<?php

namespace Ninjaparade\StripeData\Data\Response\Prices;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class StripePaginatedPriceData extends Data
{
    public function __construct(
        public readonly bool $has_more,
        #[DataCollectionOf(StripePriceData::class)]
        public readonly ?DataCollection $data,
    ) {

    }
}
