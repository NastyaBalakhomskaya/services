<?php

namespace App\Services;

use App\Models\Service;

class ServiceService
{
    public function create(array $data): Service
    {
        $service = new Service($data);
        $service->save();

        return $service;
    }

    public function edit(Service $service, array $data): void
    {
        $service->fill($data);
        $service->save();
    }

    public function delete(Service $service): void
    {
        $service->delete();
    }
}
