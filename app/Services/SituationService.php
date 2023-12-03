<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class SituationService
{
    public static function sortOrders($situation)
    {
        $user=Auth::user();
        if (!empty($situation)){
            $orders = $user->restaurant->orders()->where([
                ['situation', '=', $situation]
            ])->get();
        }
        else
        {
            $orders = $user->restaurant->orders()->where([
                ['situation', '!=', 'delivered']
            ])->get();
        }
        return $orders;
}
}
