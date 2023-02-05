<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Car\CreateRequest;
use App\Http\Requests\Api\Car\EditRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Services\CarService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CarController extends Controller
{
    public function __construct(private CarService $carService)
    {
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

    public function list(): AnonymousResourceCollection
    {
        $cars = Car::query()->latest()->paginate(3);

        return CarResource::collection($cars);
    }

    public function show(Car $car): CarResource
    {
        return new CarResource($car);
    }

    public function delete(Car $car): Response
    {
        $this->carService->delete($car);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
    }
}
