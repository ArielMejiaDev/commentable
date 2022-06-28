<?php

namespace App\Models\Contracts;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasComments
{
    /**
     * Get all of the article's comments.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')->orderByDesc('id');
    }

    public function getTypeAttribute(): string
    {
        return get_class($this);
    }
}
