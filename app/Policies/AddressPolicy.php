<?php

namespace App\Policies;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AddressPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user,Address $address)
    {
       return ($user->is($address->addressable)) ;

    }
}
