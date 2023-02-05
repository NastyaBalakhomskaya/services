<?php

namespace App\Services;

use App\Models\Schedservice;

class SchedserviceService
{
    public function create(array $data): Schedservice
    {
        $schedservice = new Schedservice($data);
        $schedservice->save();

        return $schedservice;
    }

    public function edit(Schedservice $schedservice, array $data): void
    {
        $schedservice->fill($data);
        $schedservice->save();
    }

    public function delete(Schedservice $schedservice): void
    {
        $schedservice->delete();
    }
}
