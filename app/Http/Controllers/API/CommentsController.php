<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Queries\CommentsQuery;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection as CommentsResource;
use Illuminate\Support\Facades\Gate;

class CommentsController extends Controller
{
    public function index(CommentsQuery $comments): CommentsResource
    {
        return CommentResource::collection($comments->paginate());
    }

    public function show(Comment $comment): CommentResource
    {
        return CommentResource::make($comment->load('comments'));
    }

    public function store(StoreCommentRequest $request): CommentResource
    {
        $comment = Comment::query()->make($request->validated());
        Gate::authorize('create-comment', $comment);
        $comment->save();
        return CommentResource::make($comment);
    }
}
