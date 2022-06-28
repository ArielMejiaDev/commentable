<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'excerpt' => $this->resource->excerpt,
            'body' => $this->resource->body,
            'image' => $this->resource->image,
            'type' => $this->resource->type,
            'comments' => CommentResource::collection($this->resource->comments),
        ];
    }
}
