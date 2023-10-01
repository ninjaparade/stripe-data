<?php

namespace Ninjaparade\StripeData\Data\Transformers;

use Carbon\Carbon;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Transformers\Transformer;

class UnixTimestampTransformer implements Transformer
{
    public function transform(DataProperty $property, mixed $value): mixed
    {
        return Carbon::parse($value);
    }
}
