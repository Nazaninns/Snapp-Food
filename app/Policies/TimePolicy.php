<?php

namespace App\Policies;

use App\Models\Time;
use App\Models\User;

class TimePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user,Time $time)
    {
       return $user->restaurant->times->contains($time);
    }

    public function close(User $user,Time $time)
    {
        return $user->restaurant->times->contains($time);
    }
}
