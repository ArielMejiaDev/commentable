<?php

namespace App\Http\Controllers;

use App\Http\Queries\ArticlesQuery;
use App\Models\Article;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ArticlesController extends Controller
{
    public function index(Request $request, ArticlesQuery $articles): InertiaResponse
    {
        return Inertia::render('Articles/Index', [
            'articles' => $articles->paginate(6),
        ]);
    }

    public function show(Article $article): InertiaResponse
    {
        return Inertia::render('Articles/Show', [
            'article' => $article->load('comments', 'comments.comments'),
        ]);
    }
}
