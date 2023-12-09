<?php

namespace Ninjaparade\StripeData\Models\Casts;

use Ninjaparade\StripeData\Data\Response\Customers\StripeCustomerInvoiceSettingData;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class StripInvoiceSettingCast implements CastsAttributes
{
    /**
     * {@inheritDoc}
     */
    public function get(Model $model, string $key, mixed $value, array $attributes)
    {
        return StripeCustomerInvoiceSettingData::from(json_decode($value, true));
    }

    /**
     * {@inheritDoc}
     */
    public function set(Model $model, string $key, mixed $value, array $attributes)
    {
        if (is_null($value)) {
            return null;
        }

        return json_encode($value);
    }
}
