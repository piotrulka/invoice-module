<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Application;

use Ramsey\Uuid\UuidInterface;

interface InvoiceRepositoryInterface
{
    public function get(string $id): ?array;

    public function getAll(): array;

    public function rejectInvoice(UuidInterface $id): void;

    public function acceptInvoice(UuidInterface $id): void;
}
