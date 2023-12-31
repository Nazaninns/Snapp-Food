<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\comment\AddCommentRequest;
use App\Http\Requests\api\comment\GetCommentRequest;
use App\Http\Resources\comment\CommentResource;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Food;
use App\Models\Order;
use App\Models\Restaurant;
use App\Services\CommentService;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class CommentController extends Controller
{
    public function index(GetCommentRequest $request)
    {
        $validated = $request->validated();
        if (Auth::user()->orders()->has('comment')->get()->map(function (Order $order) {
            return $order->comment;
        })->isEmpty()) return \response()->json(['data' => ['msg' => 'not found']], 404);
        $comments = CommentService::getComments($validated);
        return \response()->json(['data' => ['comments' => CommentResource::collection($comments)]]);
    }

    public function store(AddCommentRequest $request)
    {

        $this->authorize('create', [Comment::class, $request->validated('order_id')]);
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        Comment::query()->create($validated);
        return \response()->json(['data' => ['msg' => 'comment created successfully']], 201);

    }
}
