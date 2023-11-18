<?php

namespace App\Listeners;

use App\Events\SituationChangeEvent;
use App\Mail\WelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SituationChangeListener
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
    public function handle(SituationChangeEvent $event): void
    {
    $cart=$event->cart;
    Mail::to($cart->user)->send(new WelcomeMail($cart));
    }
}
