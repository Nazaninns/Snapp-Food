<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Cart;
use App\Models\Comment;
use App\Policies\ArchivePolicy;
use App\Policies\CommentPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Comment::class=>CommentPolicy::class,
        Cart::class=>ArchivePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
