<?php

namespace App\Services;

use App\Models\Schedtire;

class SchedtireService
{
    public function create(array $data): Schedtire
    {
        $schedtire = new Schedtire($data);
        $schedtire->save();

        return $schedtire;
    }

    public function edit(Schedtire $schedtire, array $data): void
    {
        $schedtire->fill($data);
        $schedtire->save();
    }

    public function delete(Schedtire $schedtire): void
    {
        $schedtire->delete();
    }
}
