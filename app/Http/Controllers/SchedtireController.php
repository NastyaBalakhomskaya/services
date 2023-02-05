<?php

namespace App\Http\Controllers;

use App\Http\Requests\Schedtire\CreateRequest;
use App\Http\Requests\Schedtire\EditRequest;
use App\Models\Schedtire;

class SchedtireController extends Controller
{
    public function createForm()
    {
        return view('schedtire.create');
    }

    public function editForm(Schedtire $schedtire)
    {
        return view('schedtire.edit', compact('schedtire'));
    }

    public function delete(Schedtire $schedtire)
    {
        $schedtire->delete();

        return redirect()->route('schedtire.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $schedtire = new Schedtire($data);
        $schedtire->save();

        session()->flash('success', 'Success!');

        return redirect()->route('schedtire.show', ['schedtire' => $schedtire->id]);
    }

    public function edit(Schedtire $schedtire, EditRequest $request)
    {
        $data = $request->validated();
        $schedtire->fill($data);
        $schedtire->save();

        session()->flash('success', 'Success!');

        return redirect()->route('schedtire.show', ['schedtire' => $schedtire->id]);
    }

    public function list()
    {
        $schedtires = Schedtire::paginate(5);

        return view('schedtire.list', ['schedtires' => $schedtires]);
    }

    public function show(Schedtire $schedtire)
    {
        return view('schedtire.show', compact('schedtire'));
    }
}
