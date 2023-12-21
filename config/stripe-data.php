<?php

return [
    'stripe' => [
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),
        'version' => env('STRIPE_API_VERSION', '2023-09-21'),
        'api_base' => env('STRIPE_API_BASE', 'https://api.stripe.com'),
        'stripe_account' => env('STRIPE_ACCOUNT', null),
        'client_id' => env('STRIPE_CLIENT_ID', null),
    ],

    'customer_class' => null,
];
