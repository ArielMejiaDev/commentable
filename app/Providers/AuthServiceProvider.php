<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
//         Model::class => ModelPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-comment', function (?User $user, Comment $comment) {
            $commentParent = $comment->commentable;

            if (!$commentParent instanceof Comment) {
                return true;
            }

            $nestedComment = $commentParent?->commentable()->exists() ? $commentParent->commentable : null;

            if (!$nestedComment instanceof Comment) {
                return true;
            }

            if ($nestedComment->commentable()->exists()) {
                return false;
            }

            return true;
        });
    }
}
