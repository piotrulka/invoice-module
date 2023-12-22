<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Api;

use Ramsey\Uuid\UuidInterface;

interface InvoiceFacadeInterface
{
    public function list(): array;

    public function get(string $id): array;

    public function acceptInvoice(UuidInterface $id): void;

    public function rejectInvoice(UuidInterface $id): void;
}
