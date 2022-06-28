<?php

namespace App\Models;

use App\Models\Contracts\HasComments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;
    use HasComments;

    protected $appends = ['type'];

    protected $fillable = [
        'body', 'commentable_id', 'commentable_type',
    ];

    /**
     * Get the parent commentable model (article or comment).
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
