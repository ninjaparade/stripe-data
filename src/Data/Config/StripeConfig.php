<?php

namespace Ninjaparade\StripeData\Data\Config;

use Spatie\LaravelData\Data;

// Yes, it's final 😂
final class StripeConfig extends Data
{
    public function __construct(
        public readonly string $key,
        public readonly string $secret,
        public readonly string $version,
        public readonly string $api_base,
        public readonly ?string $webhook_secret,
        public readonly ?string $client_id,
        public readonly ?string $stripe_account,
    ) {
    }
}
