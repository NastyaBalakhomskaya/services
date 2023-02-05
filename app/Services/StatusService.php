<?php

namespace App\Services;

use App\Models\Status;

class StatusService
{
    public function create(array $data): Status
    {
        $status = new Status($data);
        $status->save();

        return $status;
    }

    public function edit(Status $status, array $data): void
    {
        $status->fill($data);
        $status->save();
    }

    public function delete(Status $status): void
    {
        $status->delete();
    }
}
