<?php

namespace App\Services;

use App\Models\order;
use Illuminate\Support\Facades\Auth;

class ArchiveService
{
    public static function sortArchiveByDate($from, $to)
    {
        if (Auth::user()->hasRole('admin')) {
            $orders = Order::query()->where('situation', 'delivered');
        }
        if (Auth::user()->hasRole('seller')) {
            $orders = Auth::user()->restaurant->orders()->where('situation', 'delivered');
        }
        if ($from && $to) {
            $orders = $orders->where([
                ['pay', '>=', $from], ['pay', '<=', $to]
            ]);
        }
        return $orders->get();
    }
}
