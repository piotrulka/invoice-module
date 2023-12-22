<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Infrastructure\Listeners;

use App\Modules\Approval\Api\Events\EntityRejected;
use App\Modules\Invoices\Api\InvoiceFacadeInterface;

readonly class RejectInvoiceListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private InvoiceFacadeInterface $invoiceFacade)
    {
        //
    }


    public function handle(EntityRejected $event): void
    {
        $this->invoiceFacade->rejectInvoice($event->approvalDto->id);
    }
}
