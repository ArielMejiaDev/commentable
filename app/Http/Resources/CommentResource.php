<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'body' => $this->resource->body,
            'type' => $this->resource->type,
            'total_words' => strlen($this->resource->body),
            'comments' => CommentResource::collection($this->resource->comments),
        ];
    }
}
