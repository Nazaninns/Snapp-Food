<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function commentRequest()
    {
        $comments = Comment::query()->where('situation', 'delete_request')->get();
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
        'situation'=>'no_reply'
    ]);
    return redirect()->route('admin.comments.request');
    }
}
