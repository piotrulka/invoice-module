<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Infrastructure\Provider\Events;

use Carbon\Laravel\ServiceProvider;

class InvoiceEventsServiceProvider extends ServiceProvider
{
    protected array $listen = [
        'App\Modules\Approval\Api\Events\EntityApproved' => [
            'App\Modules\Invoices\Infrastructure\Listeners\AcceptInvoiceListener',
        ],
    ];

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
