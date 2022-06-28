<?php

namespace App\Http\Queries;

use App\Models\Comment;

class CommentsQuery extends EloquentQuery
{
    public function __construct()
    {
        $this->query = Comment::query();

        $this->query
            ->select(['id', 'body', 'commentable_id'])
            ->with('commentable')
            ->orderByDesc('id');
    }
}
