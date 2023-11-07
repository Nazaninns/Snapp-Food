<?php

namespace App\Http\Resources\comment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentWriterResource extends JsonResource
{
    //public static $wrap='author';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name
        ];
    }
}
