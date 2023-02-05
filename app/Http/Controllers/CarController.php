<?php

namespace App\Http\Controllers;

use App\Http\Requests\Car\CreateRequest;
use App\Http\Requests\Car\EditRequest;
use App\Models\Car;

class CarController extends Controller
{
    public function createForm()
    {
        return view('car.create');
    }

    public function editForm(Car $car)
    {
        return view('car.edit', compact('car'));
    }

    public function delete(Car $car)
    {
        $car->delete();

        return redirect()->route('car.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $car = new Car($data);
        $car->save();

        session()->flash('success', 'Success!');

        return redirect()->route('car.show', ['car' => $car->id]);
    }

    public function edit(Car $car, EditRequest $request)
    {
        $data = $request->validated();
        $car->fill($data);
        $car->save();

        session()->flash('success', 'Success!');

        return redirect()->route('car.show', ['car' => $car->id]);
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
