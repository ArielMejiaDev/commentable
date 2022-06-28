<?php

use App\Http\Controllers\API\ArticlesController;
use App\Http\Controllers\API\CommentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::apiResource('articles', ArticlesController::class)->only('index', 'show');
    Route::apiResource('comments', CommentsController::class, [])->only('index', 'show', 'store');
});
