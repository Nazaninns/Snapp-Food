<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\Time;
use App\Policies\AddressPolicy;
use App\Policies\ArchivePolicy;
use App\Policies\CartPolicy;
use App\Policies\CommentPolicy;
use App\Policies\RestaurantPolicy;
use App\Policies\TimePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Comment::class=>CommentPolicy::class,
        Order::class=>ArchivePolicy::class,
        Address::class=>AddressPolicy::class,
        Cart::class=>CartPolicy::class,
        Restaurant::class=>RestaurantPolicy::class,
        Time::class=>TimePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
