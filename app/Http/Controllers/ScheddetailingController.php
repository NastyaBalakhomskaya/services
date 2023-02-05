<?php

namespace App\Http\Controllers;

use App\Http\Requests\Scheddetailing\CreateRequest;
use App\Http\Requests\Scheddetailing\EditRequest;
use App\Models\Scheddetailing;

class ScheddetailingController extends Controller
{
    public function createForm()
    {
        return view('scheddetailing.create');
    }

    public function editForm(Scheddetailing $scheddetailing)
    {
        return view('scheddetailing.edit', compact('scheddetailing'));
    }

    public function delete(Scheddetailing $scheddetailing)
    {
        $scheddetailing->delete();

        return redirect()->route('scheddetailing.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $scheddetailing = new Scheddetailing($data);
        $scheddetailing->save();

        session()->flash('success', 'Success!');

        return redirect()->route('scheddetailing.show', ['scheddetailing' => $scheddetailing->id]);
    }

    public function edit(Scheddetailing $scheddetailing, EditRequest $request)
    {
        $data = $request->validated();
        $scheddetailing->fill($data);
        $scheddetailing->save();

        session()->flash('success', 'Success!');

        return redirect()->route('scheddetailing.show', ['scheddetailing' => $scheddetailing->id]);
    }

    public function list()
    {
        $scheddetailings = Scheddetailing::paginate(5);

        return view('scheddetailing.list', ['scheddetailings' => $scheddetailings]);
    }

    public function show(Scheddetailing $scheddetailing)
    {
        return view('scheddetailing.show', compact('scheddetailing'));
    }
}
