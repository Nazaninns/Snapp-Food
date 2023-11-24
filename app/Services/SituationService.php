<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class SituationService
{
    public static function sortCart($situation)
    {
        $user=Auth::user();
        if (!empty($situation)){
            $carts = $user->restaurant->carts()->where([
                ['pay', '!=', null],
                ['situation', '=', $situation]
            ])->get();
        }
        else
        {
            $carts = $user->restaurant->carts()->where([
                ['pay', '!=', null],
                ['situation', '!=', 'delivered']
            ])->get();
        }
        return $carts;
}
}
