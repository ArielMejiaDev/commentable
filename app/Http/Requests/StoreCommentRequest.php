<?php

namespace App\Http\Requests;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'body' => ['required', 'string', 'min:1', 'max:200'],
            'commentable_id' => ['required', 'integer'],
            'commentable_type' => ['required', 'string', Rule::in([Article::class, Comment::class])],
        ];
    }
}
