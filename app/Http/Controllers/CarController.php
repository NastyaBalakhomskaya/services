<?php

namespace App\Http\Controllers;

use App\Http\Requests\Car\CreateRequest;
use App\Http\Requests\Car\EditRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Services\CarService;
use Illuminate\Http\Response;

class CarController extends Controller
{
    public function __construct(private CarService $carService)
    {
    }

    public function delete(Car $car): Response
    {
        $this->carService->delete($car);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
    }

    public function create(CreateRequest $request): CarResource
    {
        $data = $request->validated();
        $car = $this->carService->create($data);

        return new CarResource($car);
    }

    public function edit(Car $car, EditRequest $request): CarResource
    {
        $data = $request->validated();
        $this->carService->edit($car, $data);

        return new CarResource($car);
    }

    public function createForm()
    {
        return view('car.create');
    }

    public function editForm(Car $car)
    {
        return view('car.edit', compact('car'));
    }

    public function list()
    {
        $cars = Car::paginate(5);

        return view('car.list', ['cars' => $cars]);
    }

    public function show(Car $car)
    {
        return view('car.show', compact('car'));
    }
}
