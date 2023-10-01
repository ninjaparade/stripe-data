<?php

namespace Ninjaparade\StripeData\Data\Response;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class StripeCustomerData extends Data
{
    public function __construct(
        public readonly string $object,
        public readonly string $id,
        #[MapInputName('id')]
        public readonly string $stripe_customer_id,
        public readonly ?string $name,
        public readonly ?string $phone,
        public readonly ?array $preferred_locales,
        public readonly int $balance,
        #[WithCast(DateTimeInterfaceCast::class, format: 'U', type: Carbon::class)]
        public readonly CarbonInterface $created,
        public readonly ?string $currency,
        public readonly ?string $default_source,
        public readonly bool $delinquent,
        public readonly ?string $description,
        public readonly ?string $discount,
        public readonly ?string $email,
        public readonly string $invoice_prefix,
        public readonly int $next_invoice_sequence,
        public readonly StripeCustomerInvoiceSettingData $invoice_settings,
        public readonly ?array $metadata,
    ) {
    }
}
