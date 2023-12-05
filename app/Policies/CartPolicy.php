<?php

namespace App\Policies;

use App\Models\User;

class CartPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function add(User $user)
    {
       return ($user->getCurrentAddress());
    }
}
