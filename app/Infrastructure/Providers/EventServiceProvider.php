<?php

declare(strict_types=1);

namespace App\Infrastructure\Providers;

use App\Modules\Approval\Api\Events\EntityApproved;
use App\Modules\Approval\Api\Events\EntityRejected;
use App\Modules\Invoices\Infrastructure\Listeners\AcceptInvoiceListener;
use App\Modules\Invoices\Infrastructure\Listeners\RejectInvoiceListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        EntityApproved::class => [
            AcceptInvoiceListener::class,
        ],
        EntityRejected::class => [
            RejectInvoiceListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     */
    public function boot(): void
    {
        Event::listen(AcceptInvoiceListener::class);
        Event::listen(RejectInvoiceListener::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
