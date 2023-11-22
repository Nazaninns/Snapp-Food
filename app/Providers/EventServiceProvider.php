<?php

namespace App\Providers;

use App\Events\SituationChangeEvent;
use App\Events\WelcomeCustomerEvent;
use App\Events\WelcomeSellerEvent;
use App\Listeners\SituationChangeListener;
use App\Listeners\WelcomeCustomerListener;
use App\Listeners\WelcomeSellerListener;
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
        SituationChangeEvent::class => [
            SituationChangeListener::class
        ],
        WelcomeCustomerEvent::class => [
            WelcomeCustomerListener::class
        ],
        WelcomeSellerEvent::class => [
            WelcomeSellerListener::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
