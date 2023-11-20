<?php

namespace Ninjaparade\StripeData\Data\Response\Customers;

use Spatie\LaravelData\Data;

class StripeCustomerInvoiceSettingData extends Data
{
    public function __construct(
        public readonly ?array $custom_fields,
        public readonly ?string $default_payment_method,
        public readonly ?string $footer,
        public readonly ?string $rendering_options
    ) {

    }
}
