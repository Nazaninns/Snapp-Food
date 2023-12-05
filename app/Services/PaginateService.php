<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;

class PaginateService
{

    public static function paginate($paginate, $objects)
    {
        if (isset($paginate))
            session(['paginate'=> $paginate]);
        $objects = $objects->paginate(session('paginate', 6));
        return $objects;
    }
}
