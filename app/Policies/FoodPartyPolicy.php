<?php

namespace App\Policies;

use App\Models\Food;
use App\Models\FoodParty;
use App\Models\User;

class FoodPartyPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user,$food)
    {
        return $user->restaurant->food->contains($food);
    }

    public function update(User $user,FoodParty $foodParty)
    {
        $food= $user->restaurant->food->filter(function (Food $food) use ($foodParty){
           return $food->foodParty->is($foodParty);
        });
        return ($food->isNotEmpty());
    }

    public function delete(User $user,FoodParty $foodParty)
    {
        $food= $user->restaurant->food->filter(function (Food $food) use ($foodParty){
            return $food->foodParty->is($foodParty);
        });
        return ($food->isNotEmpty());
    }
}
