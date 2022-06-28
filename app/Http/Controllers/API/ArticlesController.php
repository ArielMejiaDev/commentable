<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Queries\ArticlesQuery;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection as ArticlesResource;

class ArticlesController extends Controller
{
    public function index(Request $request, ArticlesQuery $articles): ArticlesResource
    {
        return ArticleResource::collection($articles->paginate(6));
    }

    public function show(Article $article): ArticleResource
    {
        return ArticleResource::make($article->load('comments:id,body,commentable_id,commentable_type'));
    }
}
