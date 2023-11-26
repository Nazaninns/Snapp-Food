<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\CommentRequest;
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
}
