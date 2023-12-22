<?php

declare(strict_types=1);

namespace App\Infrastructure\Controllers;

use App\Infrastructure\Controller;
use App\Modules\Invoices\Api\InvoiceFacadeInterface;
use Illuminate\Http\JsonResponse;

class InvoiceController extends Controller
{
    public function __construct(private readonly InvoiceFacadeInterface $invoicesFacade)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json([
                'data' => $this->invoicesFacade->list(),
                'created_at' => now(),
            ]);
    }

    public function show(string $id): JsonResponse
    {
        return response()->json([
            'data' => $this->invoicesFacade->get($id),
            'created_at' => now(),
        ]);
    }
}
