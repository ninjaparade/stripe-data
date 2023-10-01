<?php

namespace Ninjaparade\StripeData\Facades;

use Illuminate\Support\Facades\Facade;
use Ninjaparade\StripeData\Stripe\StripeService;

class StripeClient extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return StripeService::class;
    }
}
