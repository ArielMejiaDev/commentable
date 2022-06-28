<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class CommentsController extends Controller
{
    public function store(StoreCommentRequest $request): RedirectResponse
    {
        $comment = Comment::query()->make($request->validated());
        Gate::authorize('create-comment', $comment);
        $comment->save();
        return redirect()->back();
    }
}
