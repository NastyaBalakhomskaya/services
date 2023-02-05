<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SchedtireResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'date_record' => $this->date_record,
            'time_record' => $this->time_record,
        ];
    }
}
