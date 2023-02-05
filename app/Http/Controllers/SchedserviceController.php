<?php

namespace App\Http\Controllers;

use App\Http\Requests\Schedservice\CreateRequest;
use App\Http\Requests\Schedservice\EditRequest;
use App\Models\Schedservice;

class SchedserviceController extends Controller
{
    public function createForm()
    {
        return view('schedservice.create');
    }

    public function editForm(Schedservice $schedservice)
    {
        return view('schedservice.edit', compact('schedservice'));
    }

    public function delete(Schedservice $schedservice)
    {
        $schedservice->delete();

        return redirect()->route('schedservice.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $schedservice = new Schedservice($data);
        $schedservice->save();

        session()->flash('success', 'Success!');

        return redirect()->route('schedservice.show', ['schedservice' => $schedservice->id]);
    }

    public function edit(Schedservice $schedservice, EditRequest $request)
    {
        $data = $request->validated();
        $schedservice->fill($data);
        $schedservice->save();

        session()->flash('success', 'Success!');

        return redirect()->route('schedservice.show', ['schedservice' => $schedservice->id]);
    }

    public function list()
    {
        $schedservices = Schedservice::paginate(5);

        return view('schedservice.list', ['schedservices' => $schedservices]);
    }

    public function show(Schedservice $schedservice)
    {
        return view('schedservice.show', compact('schedservice'));
    }
}
