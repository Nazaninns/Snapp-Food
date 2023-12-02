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
            ])->paginate(3);
        }
        else
        {
            $carts = $user->restaurant->carts()->where([
                ['pay', '!=', null],
                ['situation', '!=', 'delivered']
            ])->paginate(3);
        }
        return $carts;
}
}
