<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommentsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [ArticlesController::class, 'index']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');
Route::post('comments', [CommentsController::class, 'store'])->name('comments.store');
