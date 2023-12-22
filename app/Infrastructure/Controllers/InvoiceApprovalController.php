<?php

declare(strict_types=1);

namespace App\Infrastructure\Controllers;

use App\Domain\Enums\StatusEnum;
use App\Http\Resources\Invoice;
use App\Infrastructure\Controller;
use App\Modules\Approval\Api\ApprovalFacadeInterface;
use App\Modules\Approval\Api\Dto\ApprovalDto;
use Illuminate\Http\JsonResponse;
use InvalidArgumentException;
use Ramsey\Uuid\Uuid;

class InvoiceApprovalController extends Controller
{
    public function __construct(private readonly ApprovalFacadeInterface $invoicesApprovalFacade)
    {
    }

    public function accept(string $id): JsonResponse
    {
        if (!Uuid::isValid($id)) {
            throw new InvalidArgumentException('Invalid UUID');
        }

        $approval = new ApprovalDto(Uuid::fromString($id), StatusEnum::APPROVED, Invoice::class);
        $status = $this->invoicesApprovalFacade->accept($approval);

        if (true === $status) {
            return response()->json([
                'data' => [
                    'id' => $id,
                    'status' => StatusEnum::APPROVED,
                ],
                'message' => 'Invoice accepted',
            ]);
        }

        return response()->json([
            'data' => [
                'id' => $id,
                'status' => StatusEnum::DRAFT,
            ],
            'message' => 'Invoice already accepted',
        ]);
    }

    public function reject(string $id): JsonResponse
    {
        if (!Uuid::isValid($id)) {
            throw new InvalidArgumentException('Invalid UUID');
        }

        $approval = new ApprovalDto(Uuid::fromString($id), StatusEnum::REJECTED, Invoice::class);
        $this->invoicesApprovalFacade->reject($approval);

        return response()->json([
            'data' => [
                'id' => $id,
                'status' => StatusEnum::REJECTED,
            ],
            'message' => 'Invoice rejected',
        ]);
    }
}
