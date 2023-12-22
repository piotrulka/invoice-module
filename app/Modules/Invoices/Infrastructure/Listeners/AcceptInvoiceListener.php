<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Infrastructure\Listeners;

use App\Modules\Approval\Api\Events\EntityApproved;
use App\Modules\Invoices\Api\InvoiceFacadeInterface;

readonly class AcceptInvoiceListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private InvoiceFacadeInterface $invoiceFacade)
    {
    }


    public function handle(EntityApproved $event): void
    {
        $this->invoiceFacade->acceptInvoice($event->approvalDto->id);
    }
}
