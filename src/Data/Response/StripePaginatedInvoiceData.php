<?php

namespace Ninjaparade\StripeData\Data\Response;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class StripePaginatedInvoiceData extends Data
{
    public function __construct(
        public readonly bool $has_more,
        #[DataCollectionOf(StripeInvoiceData::class)]
        public readonly ?DataCollection $data,
    ) {

    }
}
