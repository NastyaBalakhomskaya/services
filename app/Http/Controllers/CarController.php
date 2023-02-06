<?php

namespace App\Http\Controllers;

use App\Http\Requests\Car\CreateRequest;
use App\Http\Requests\Car\EditRequest;
use App\Models\Car;
use App\Services\CarService;

class CarController extends Controller
{
    public function __construct(private CarService $carService)
    {
    }

    public function delete(Car $car)
    {
        $this->carService->delete($car);

        return redirect()->route('car.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $car = $this->carService->create($data);

        session()->flash('success', 'Success!');

        return redirect()->route('car.show', ['car' => $car->id]);
    }

    public function edit(Car $car, EditRequest $request)
    {
        $data = $request->validated();
        $this->carService->edit($car, $data);

        session()->flash('success', 'Success!');

        return redirect()->route('car.show', ['car' => $car->id]);
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
