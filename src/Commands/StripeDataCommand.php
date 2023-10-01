<?php

namespace Ninjaparade\StripeData\Commands;

use Illuminate\Console\Command;

class StripeDataCommand extends Command
{
    public $signature = 'stripe-data';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
