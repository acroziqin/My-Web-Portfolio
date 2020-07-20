<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'thumbnail' => $this->thumbnail,
            'slug' => $this->slug,
            'body' => $this->body,
            'category' => $this->category->name,
            'published' => $this->created_at->diffForHumans(),
            'author' => $this->author->name,
        ];
    }

    public function with($request)
    {
        return ['status' => 'success'];
    }
}
