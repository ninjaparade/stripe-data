<?php

namespace Ninjaparade\StripeData\Data\Response\Prices;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Ninjaparade\StripeData\Enums\BillingType;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class StripePriceData extends Data
{
    public function __construct(
        public readonly string $object,
        public readonly ?string $name,
        #[MapInputName('id')]
        public readonly string $stripe_id,
        public readonly string $product,
        public readonly bool $active,
        public readonly string $billing_scheme,
        public readonly string $currency,
        public readonly string|int $unit_amount,
        public readonly ?string $nickname,
        public readonly ?string $lookup_key,
        public readonly ?string $tax_behavior,
        public readonly BillingType $type,

        public readonly array|string|null $recurring,
        public readonly ?array $metadata,

        #[WithCast(DateTimeInterfaceCast::class, format: 'U', type: Carbon::class), MapInputName('created')]
        public readonly CarbonInterface $created_at,
    ) {
    }
}
