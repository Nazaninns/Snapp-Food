<?php

namespace App\Listeners;

use App\Events\SituationChangeEvent;
use App\Mail\ChangeSituationMail;
use App\Mail\WelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SituationChangeListener implements ShouldQueue
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
    $order=$event->order;
    Mail::to($order->user)->send(new ChangeSituationMail($order));
    }
}
