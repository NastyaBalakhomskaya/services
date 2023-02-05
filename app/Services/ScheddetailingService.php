<?php

namespace App\Services;

use App\Models\Scheddetailing;

class ScheddetailingService
{
    public function create(array $data): Scheddetailing
    {
        $scheddetailing = new Scheddetailing($data);
        $scheddetailing->save();

        return $scheddetailing;
    }

    public function edit(Scheddetailing $scheddetailing, array $data): void
    {
        $scheddetailing->fill($data);
        $scheddetailing->save();
    }

    public function delete(Scheddetailing $scheddetailing): void
    {
        $scheddetailing->delete();
    }
}
