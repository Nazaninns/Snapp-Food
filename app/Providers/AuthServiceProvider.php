<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Food;
use App\Models\FoodParty;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\Time;
use App\Models\User;
use App\Policies\AddressPolicy;
use App\Policies\FoodPartyPolicy;
use App\Policies\FoodPolicy;
use App\Policies\OrderPolicy;
use App\Policies\CartPolicy;
use App\Policies\CommentPolicy;
use App\Policies\RestaurantPolicy;
use App\Policies\TimePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Comment::class => CommentPolicy::class,
        Order::class => OrderPolicy::class,
        Address::class => AddressPolicy::class,
        Cart::class => CartPolicy::class,
        Restaurant::class => RestaurantPolicy::class,
        Time::class => TimePolicy::class,
        Food::class => FoodPolicy::class,
        FoodParty::class => FoodPartyPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('access_routes', function (User $user) {
            if ($user->restaurant == null) return false;
            return true;
        });
    }
}
