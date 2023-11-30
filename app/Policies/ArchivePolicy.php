<?php

namespace App\Policies;

use App\Models\Cart;
use App\Models\User;

class ArchivePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function show(User $user, Cart $cart)
    {
        return $user->restaurant->carts->contains($cart);
    }
}
