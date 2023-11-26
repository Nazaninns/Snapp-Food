<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\CommentRequest;
use App\Http\Requests\seller\StoreReplyRequest;
use App\Models\Comment;
use App\Models\Reply;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(CommentRequest $request)
    {
        $comments = Auth::user()->restaurant->carts()->has('comments')->get()->pluck('comments')->flatten();
        $food = Auth::user()->restaurant->food;
        if (!empty($request->validated('filter'))) {
            $comments = CommentService::CommentSort($request->validated('filter'));
            //dd($comments);
        }

        return view('seller.comments', compact('comments', 'food'));
    }

    public function reply(Comment $comment, StoreReplyRequest $request)
    {
        if (!Auth::user()->restaurant->carts()->has('comments')->get()->pluck('comments')->flatten()
            ->contains($comment))
            return redirect()->route('comments.index');
        $validated = $request->validated();
        $validated['restaurant_id'] = Auth::user()->restaurant->id;
        $validated['comment_id'] = $comment->id;
        Reply::query()->create($validated);
        $comment->situation='replied';
        $comment->save();
        return redirect()->route('comments.index');
    }

    public function accept(Comment $comment)
    {
        $comment->update([
            'situation'=>'no_reply'
        ]);
        return redirect()->route('comments.index');
    }

    public function deleteRequest(Comment $comment)
    {
        $comment->update(['situation'=>'delete_request']);
        return redirect()->route('comments.index');
    }
}
