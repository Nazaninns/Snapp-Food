<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ArchiveService
{
    public static function sortArchiveByDate($from, $to)
    {
        if (Auth::user()->hasRole('admin')) {
            $carts = Cart::query()->where('situation', 'delivered');
        }
        if (Auth::user()->hasRole('seller')) {
            $carts = Auth::user()->restaurant->carts()->where('situation', 'delivered');
        }
        if ($from && $to) {
            $carts = $carts->where([
                ['pay', '>=', $from], ['pay', '<=', $to]
            ]);
        }
        return $carts->get();
    }
}
