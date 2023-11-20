<?php

namespace Ninjaparade\StripeData\Models;

use Illuminate\Database\Eloquent\Model;

class StripeProduct extends Model
{
    protected $table = 'stripe_products';

    protected $guarded = ['id'];

    protected $casts = [
        'active' => 'boolean',
        'attributes' => 'array',
        'features' => 'array',
        'images' => 'array',
        'metadata' => 'array',
    ];

    protected $attributes = [
        'active' => true,
    ];
}
