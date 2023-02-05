<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'height' => $this->height,
            'length' => $this->length,
            'width' => $this->width,
            'price' => $this->price,
            'count' => $this->count,
        ];
    }
}
