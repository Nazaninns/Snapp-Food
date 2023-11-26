<?php

namespace App\View\Components\comment;

use App\Models\Comment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class repliedComment extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Comment $comment)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comment.replied-comment');
    }
}
