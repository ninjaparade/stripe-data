<?php

namespace Ninjaparade\StripeData\Data\Response\Prices;

use Carbon\Carbon;
use Carbon\CarbonInterface;
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
        public readonly string $type,
        //        public readonly ?array $recurring,
        //        public readonly ?array $metadata,

        #[WithCast(DateTimeInterfaceCast::class, format: 'U', type: Carbon::class), MapInputName('created')]
        public readonly CarbonInterface $created_at,
    ) {
    }
}

/*

      "id" => "price_1Na3VOFw6aD3pDxKKHMZuJcH"
      "object" => "price"
      "active" => true
      "billing_scheme" => "per_unit"
      "created" => 1690838394
      "currency" => "usd"
      "custom_unit_amount" => null
      "livemode" => false
      "lookup_key" => null
      "metadata" => []
      "nickname" => null
      "product" => "prod_OMn5f7sun9043J"
      "recurring" => array:5 [
        "aggregate_usage" => null
        "interval" => "year"
        "interval_count" => 1
        "trial_period_days" => null
        "usage_type" => "licensed"
      ]
      "tax_behavior" => "unspecified"
      "tiers_mode" => null
      "transform_quantity" => null
      "type" => "recurring"
      "unit_amount" => 900000
      "unit_amount_decimal" => "900000"
    ]
 */
