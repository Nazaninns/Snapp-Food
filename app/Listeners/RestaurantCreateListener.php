<?php

namespace App\Listeners;

use App\Events\RestaurantCreateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RestaurantCreateListener implements ShouldQueue
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
    public function handle(RestaurantCreateEvent $event): void
    {
        $restaurant = $event->restaurant;
        $restaurant->times()->createMany([
            ['day' => 'saturday', 'start_time' => '09:00', 'end_time' => '21:00'],
            ['day' => 'sunday', 'start_time' => '09:00', 'end_time' => '21:00'],
            ['day' => 'monday', 'start_time' => '09:00', 'end_time' => '21:00'],
            ['day' => 'tuesday', 'start_time' => '09:00', 'end_time' => '21:00'],
            ['day' => 'wednesday', 'start_time' => '09:00', 'end_time' => '21:00'],
            ['day' => 'thursday', 'start_time' => '09:00', 'end_time' => '21:00'],
            ['day' => 'friday', 'start_time' => '09:00', 'end_time' => '21:00']
        ]);
    }
}
