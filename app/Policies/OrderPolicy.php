<?php

namespace App\Policies;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function show(User $user, Order $order)
    {
        if ($user->hasRole('seller'))
            return $user->restaurant->orders->contains($order);
        if ($user->hasRole('customer'))
            return $user->orders->contains($order);
    }

    public function update(User $user,Order $order)
    {
        return $user->restaurant->orders->contains($order);
    }

    public function delete(User $user,Order $order)
    {
        return $user->restaurant->orders->contains($order);
    }
}
