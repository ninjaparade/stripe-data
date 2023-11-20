<?php

namespace Ninjaparade\StripeData\Models;

use Illuminate\Database\Eloquent\Model;
use Ninjaparade\StripeData\Models\Casts\StripInvoiceSettingCast;

class StripeCustomer extends Model
{
    protected $table = 'stripe_customers';

    protected $guarded = ['id'];

    protected $casts = [
        'balance' => 'integer',
        'delinquent' => 'boolean',
        'invoice_settings' => StripInvoiceSettingCast::class,
        'preferred_locales' => 'array',
        'metadata' => 'array',
    ];

    protected $attributes = [
        'balance' => 0,
        'delinquent' => false,
    ];
}