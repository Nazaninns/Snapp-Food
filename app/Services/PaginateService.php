<?php

namespace App\Services;

class PaginateService
{
    public static int $paginate = 6;
    public static function paginate($paginate, $objects)
    {
        if (isset($paginate))
         self::$paginate=$paginate;
        $objects=$objects->paginate(self::$paginate);
        return $objects;
    }
}
