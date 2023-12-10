<?php

namespace Ninjaparade\StripeData\Enums;

enum BillingType: string
{
    case OneTime = 'one_time';
    case Recurring = 'recurring';
}
