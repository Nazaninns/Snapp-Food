<?php

namespace App\Http\Resources\comment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    //public static $wrap='comments';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'author'=>new CommentWriterResource($this->user),
            'food'=>CommentFoodResource::collection($this->cart->food),
            'created_at'=>$this->created_at,
            'score'=>$this->score,
            'content'=>$this->text
        ];
    }
}
