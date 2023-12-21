<?php

namespace Ninjaparade\StripeData\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(
            config('stripe-data.tenant_model'),
            'tenant_id'
        );
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(
            config('stripe-data.customer_model'),
            'account_id'
        );
    }
}
