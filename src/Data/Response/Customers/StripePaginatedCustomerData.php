<?php

namespace Ninjaparade\StripeData\Data\Response\Customers;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class StripePaginatedCustomerData extends Data
{
    public function __construct(
        public readonly bool $has_more,
        #[DataCollectionOf(StripeCustomerData::class)]
        public readonly ?DataCollection $data,
    ) {

    }
}
