<?php

namespace App\Services;

use App\Models\Tire;

class TireService
{
    public function create(array $data): Tire
    {
        $tire = new Tire($data);
        $tire->save();

        return $tire;
    }

    public function edit(Tire $tire, array $data): void
    {
        $tire->fill($data);
        $tire->save();
    }

    public function delete(Tire $tire): void
    {
        $tire->delete();
    }
}
