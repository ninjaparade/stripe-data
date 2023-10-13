<?php

namespace Ninjaparade\StripeData\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ninjaparade\StripeData\StripeData
 */
class StripeData extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Ninjaparade\StripeData\StripeData::class;
    }
}
