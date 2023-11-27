<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class ArchiveService
{
    public static function sortArchiveByDate($from, $to)
    {
        $carts = Auth::user()->restaurant->carts()->where('situation', 'delivered');
        if ($from && $to) {
            $carts=$carts->where([
                ['pay','>=',$from],['pay','<=',$to]
            ]);
        }
        return $carts->get();
    }
}
