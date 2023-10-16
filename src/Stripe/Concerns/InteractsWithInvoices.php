<?php

namespace Ninjaparade\StripeData\Stripe\Concerns;

use Ninjaparade\StripeData\Data\Response\StripePaginatedInvoiceData;

trait InteractsWithInvoices
{
    public function invoices(int $limit = 100): StripePaginatedInvoiceData
    {
        $invoices = $this->client()->invoices->all(['limit' => $limit]);

        return StripePaginatedInvoiceData::from($invoices->toArray());
    }
}
