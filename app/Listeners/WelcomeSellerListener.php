<?php

namespace App\Listeners;

use App\Events\WelcomeSellerEvent;
use App\Mail\WelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeSellerListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WelcomeSellerEvent $event): void
    {
        $user=$event->user;
        Mail::to($user)->send(new WelcomeMail($user));
    }
}
