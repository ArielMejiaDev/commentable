<?php

namespace App\Http\Queries;

use App\Models\Article;

class ArticlesQuery extends EloquentQuery
{
    public function __construct()
    {
        $this->query = Article::query();
        $this->query
            ->select(['id', 'title', 'body', 'excerpt', 'image'])
            ->orderByDesc('id');
    }
}
