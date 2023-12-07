<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginateRequest;
use App\Models\Comment;
use App\Services\PaginateService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function commentRequest(PaginateRequest $request)
    {
        $comments = Comment::query()->where('situation', 'delete_request')->orderByDesc('created_at');
        $comments = PaginateService::paginate($request->validated('paginate'), $comments);
        return view('admin.comments.index', compact('comments'));
    }

    public function accept(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.request');
    }

    public function reject(Comment $comment)
    {
        $comment->update([
            'situation' => 'no_reply'
        ]);
        return redirect()->route('admin.comments.request');
    }
}
