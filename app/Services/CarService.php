<?php

namespace App\Services;

use App\Models\Car;

class CarService
{
    public function create(array $data): Car
    {
        $car = new Car($data);
        $car->save();

        return $car;
    }

    public function edit(Car $car, array $data): void
    {
        $car->fill($data);
        $car->save();
    }

    public function delete(Car $car): void
    {
        $car->delete();
    }
}
