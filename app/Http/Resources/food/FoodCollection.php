<?php

namespace App\Http\Resources\food;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FoodCollection extends ResourceCollection
{
    //public static $wrap=null;
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'categories'=>$this->collection,

        ];
}}
