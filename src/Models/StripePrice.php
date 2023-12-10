<?php

namespace Ninjaparade\StripeData\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ninjaparade\StripeData\Enums\BillingType;

class StripePrice extends Model
{
    protected $table = 'stripe_prices';

    protected $guarded = ['id'];

    protected $casts = [
        'type' => BillingType::class,
        //        'unit_amount' => 'integer',
        //        'recurring' => 'array',
        'recurring' => 'json',
        'metadata' => 'json',
        //        'active' => 'boolean',
    ];

    //
    protected $attributes = [
        'metadata' => [],
        'recurring' => [],
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(StripeProduct::class);
    }
}
