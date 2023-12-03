<?php

namespace App\Policies;

use App\Models\User;

class RestaurantPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function get(User $user)
    {
        return ($user->getCurrentAddress());
    }
}
