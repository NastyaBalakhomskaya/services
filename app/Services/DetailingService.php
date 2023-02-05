<?php

namespace App\Services;

use App\Models\Detailing;

class DetailingService
{
    public function create(array $data): Detailing
    {
        $detailing = new Detailing($data);
        $detailing->save();

        return $detailing;
    }

    public function edit(Detailing $detailing, array $data): void
    {
        $detailing->fill($data);
        $detailing->save();
    }

    public function delete(Detailing $detailing): void
    {
        $detailing->delete();
    }
}
