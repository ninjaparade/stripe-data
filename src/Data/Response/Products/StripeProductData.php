<?php

namespace Ninjaparade\StripeData\Data\Response\Products;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class StripeProductData extends Data
{
    public function __construct(
        public readonly string $object,
        public readonly string $name,
        #[MapInputName('id')]
        public readonly string $stripe_id,
        #[MapInputName('default_price')]
        public readonly ?string $default_price_id,
        public readonly string $type,
        public readonly ?string $unit_label,
        public readonly ?string $url,
        public readonly bool $active,
        public readonly array $attributes,
        public readonly array $features,
        public readonly array $images,
        public readonly ?string $tax_code,
        #[WithCast(DateTimeInterfaceCast::class, format: 'U', type: Carbon::class), MapInputName('created')]
        public readonly CarbonInterface $created_at,
        #[WithCast(DateTimeInterfaceCast::class, format: 'U', type: Carbon::class), MapInputName('updated')]
        public readonly CarbonInterface $updated_at,

        public readonly ?array $metadata,
    ) {
    }
}
