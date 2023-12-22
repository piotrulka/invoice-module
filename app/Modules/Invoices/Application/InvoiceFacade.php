<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Application;

use App\Modules\Invoices\Api\InvoiceFacadeInterface;
use Ramsey\Uuid\UuidInterface;

readonly class InvoiceFacade implements InvoiceFacadeInterface
{
    public function __construct(private InvoiceRepositoryInterface $repository)
    {
    }


    /**
     * @return array<array>
     */
    public function list(): array
    {
        return $this->repository->getAll();
    }

    /**
     * @return array<array>
     */
    public function get(string $id): array
    {
        return $this->repository->get($id);
    }

    public function rejectInvoice(UuidInterface $id): void
    {
        $this->repository->rejectInvoice($id);
    }

    public function acceptInvoice(UuidInterface $id): void
    {
        $this->repository->acceptInvoice($id);
    }
}

