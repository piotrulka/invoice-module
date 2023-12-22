<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Infrastructure\Repository;

use App\Domain\Enums\StatusEnum;
use App\Modules\Invoices\Application\InvoiceRepositoryInterface;
use App\Modules\Invoices\Infrastructure\Database\Model\Invoice;
use Ramsey\Uuid\UuidInterface;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function get(string $id): ?array
    {
        return Invoice::with('company', 'productLines')->find($id)->toArray();
    }

    public function getAll(): array
    {
        return Invoice::with('company', 'productLines')->get(['id', 'company_id'])->toArray();
    }

    public function rejectInvoice(UuidInterface $id): void
    {
        $invoice = Invoice::findOrFail($id->toString());
        $invoice->status = StatusEnum::REJECTED;
        $invoice->save();
    }

    public function acceptInvoice(UuidInterface $id): void
    {
        $invoice = Invoice::findOrFail($id->toString());
        $invoice->status = StatusEnum::APPROVED;
        $invoice->save();
    }
}
