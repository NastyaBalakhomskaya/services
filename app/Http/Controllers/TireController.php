<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tire\CreateRequest;
use App\Http\Requests\Tire\EditRequest;
use App\Models\Tire;

class TireController extends Controller
{
    public function createForm()
    {
        return view('tire.create');
    }

    public function editForm(Tire $tire)
    {
        return view('tire.edit', compact('tire'));
    }

    public function delete(Tire $tire)
    {
        $tire->delete();

        return redirect()->route('tire.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $tire = new Tire($data);
        $tire->save();

        session()->flash('success', 'Success!');

        return redirect()->route('tire.show', ['tire' => $tire->id]);
    }

    public function edit(Tire $tire, EditRequest $request)
    {
        $data = $request->validated();
        $tire->fill($data);
        $tire->save();

        session()->flash('success', 'Success!');

        return redirect()->route('tire.show', ['tire' => $tire->id]);
    }

    public function list()
    {
        $tires = Tire::paginate(5);

        return view('tire.list', ['tires' => $tires]);
    }

    public function show(Tire $tire)
    {
        return view('tire.show', compact('tire'));
    }
}
