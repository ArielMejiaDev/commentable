<?php

namespace App\Models;

use App\Models\Contracts\HasComments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Article extends Model
{
    use HasFactory;
    use HasComments;

    protected $appends = ['type'];

    protected $fillable = [
        'title', 'excerpt', 'body', 'image',
    ];
}
