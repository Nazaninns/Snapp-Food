<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateRequest;
use App\Http\Requests\seller\CommentRequest;
use App\Http\Requests\seller\StoreReplyRequest;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Reply;
use App\Services\CommentService;
use App\Services\PaginateService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(CommentRequest $request, PaginateRequest $paginateRequest)
    {
        $comments = Auth::user()->restaurant->orders()->has('comment')->get()->map(fn (Order $order) => $order->comment)->sortByDesc('created_at');
        if ($comments->isNotEmpty()) $comments = $comments->toQuery();
        $food = Auth::user()->restaurant->food;
        if (!empty($request->validated('filter'))) {
            $this->authorize('show', [Comment::class, $request->validated('filter')]);
            $comments = CommentService::CommentSort($request->validated('filter'));
        }
        $comments = PaginateService::paginate($paginateRequest->validated('paginate'), $comments);
        return view('seller.comments', compact('comments', 'food'));
    }

    public function reply(Comment $comment, StoreReplyRequest $request)
    {
        $this->authorize('reply', $comment);
        CommentService::reply($request->validated(), $comment);
        return redirect()->route('comments.index');
    }

    public function accept(Comment $comment)
    {
        $this->authorize('update', $comment);
        $comment->update([
            'situation' => 'no_reply'
        ]);
        return redirect()->route('comments.index');
    }

    public function deleteRequest(Comment $comment)
    {
        $this->authorize('update', $comment);
        $comment->update(['situation' => 'delete_request']);
        return redirect()->route('comments.index');
    }
}
