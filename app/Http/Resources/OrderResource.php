<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'status' => $this->status,
            'description' => $this->description,
            'user_id' => $this->user_id,
            'detailings' => DetailingResource::collection($this->detailings),
            'services' => ServiceResource::collection($this->services),
            'tires' => TireResource::collection($this->tires),
            'cars' => CarResource::collection($this->cars),
        ];
    }
}
