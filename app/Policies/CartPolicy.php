<?php

namespace App\Policies;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\User;
use App\Services\RestaurantFilterService;

class CartPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function add(User $user, $foodId)
    {
        $restaurants = RestaurantFilterService::nearRestaurants(Restaurant::all());
        $restaurants = $restaurants->filter(function (Restaurant $restaurant) use ($foodId) {
            return $restaurant->food->contains($foodId);
        });
        if ($restaurants->isEmpty()) return false;
        return ($user->getCurrentAddress());
    }

    public function show(User $user, Cart $cart)
    {
        return $user->carts->contains($cart);
    }

    public function pay(User $user, Cart $cart)
    {
        return $user->carts->contains($cart);
    }

}
