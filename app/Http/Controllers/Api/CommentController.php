<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\comment\AddCommentRequest;
use App\Http\Requests\api\comment\GetCommentRequest;
use App\Http\Resources\comment\CommentResource;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Food;
use App\Models\Restaurant;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(GetCommentRequest $request)
    {
        $validated = $request->validated();
        if (isset($validated['restaurant_id'])) {
            $comments = Cart::query()->where('restaurant_id', $validated['restaurant_id'])->with('comments')->getRelation('comments');
            return \response()->json(['comments'=>CommentResource::collection($comments->get())]);
        }
        if (isset($validated['food_id'])) {
            $comments = Food::query()->find($validated['food_id'])->carts()->with('comments')->getRelation('comments');
            return \response()->json(['comments'=>CommentResource::collection($comments->get())]);
        }
    }

    public function store(AddCommentRequest $request)
    {

        $this->authorize('create',[Comment::class,$request->validated('cart_id')]);
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        Comment::query()->create($validated);
        return \response()->json(['msg'=>'comment created successfully'],201);

    }
}
