<?php

namespace Ninjaparade\StripeData\Data\Response\Invoices;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class StripeInvoiceData extends Data
{
    public function __construct(
        #[MapInputName('id')]
        public readonly string $stripe_id,
        public readonly string $number,

        //        // Invoice Payment information
        public readonly ?string $currency,
        public readonly int $amount_due,
        public readonly int $amount_paid,
        public readonly int $amount_remaining,
        public readonly int $amount_shipping,
        public readonly int $subtotal,
        public readonly int $subtotal_excluding_tax,
        public readonly int $total,
        public readonly int $total_excluding_tax,
        public readonly array $discounts,
        public readonly array $total_tax_amounts,
        public readonly array $total_discount_amounts,

        // Invoice Specific Data
        public readonly string $status,
        public readonly string $billing_reason,
        // Subscription Information (if it's a recurring invoice)
        public readonly ?string $stripe_subscription_id,
        #[WithCast(DateTimeInterfaceCast::class, format: 'U', type: Carbon::class)]
        public readonly ?CarbonInterface $period_start,
        #[WithCast(DateTimeInterfaceCast::class, format: 'U', type: Carbon::class)]
        public readonly ?CarbonInterface $period_end,

        // Invoice Charge data
        public readonly ?string $charge_id,
        #[WithCast(DateTimeInterfaceCast::class, format: 'U', type: Carbon::class)]
        public readonly ?CarbonInterface $invoice_created_at,
        #[WithCast(DateTimeInterfaceCast::class, format: 'U', type: Carbon::class)]
        public readonly ?CarbonInterface $invoice_due_date,

        public readonly int $starting_balance,
        public readonly ?string $post_payment_credit_notes_amount,
        public readonly ?string $pre_payment_credit_notes_amount,
        public readonly int $attempt_count,
        public readonly int $attempted,
        public readonly bool $auto_advance,
        public readonly array $automatic_tax,
        public readonly ?array $payment_settings,
        public readonly ?array $status_transitions,
        public readonly ?string $collection_method,

        // Stripe Customer Data
        public readonly ?string $stripe_customer_id,
        public readonly array $customer_address,
        public readonly ?string $customer_email,
        public readonly ?string $customer_name,
        public readonly ?string $customer_phone,
        public readonly ?string $customer_shipping,
        public readonly ?string $customer_tax_exempt,

        // Stripe Connect Application Data
        public readonly ?string $account_name,
        public readonly ?string $account_country,
        public readonly ?string $application,
        public readonly ?int $application_fee_amount,
        public readonly ?array $transfer_data,

        public readonly ?string $description,
        public readonly ?string $stripe_discount_id,
        public readonly ?string $invoice_pdf,

        public readonly ?array $metadata,
    ) {

    }
}
