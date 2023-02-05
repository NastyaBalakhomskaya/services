<?php

namespace App\Http\Controllers;

use App\Http\Requests\Detailing\CreateRequest;
use App\Http\Requests\Detailing\EditRequest;
use App\Models\Detailing;

class DetailingController extends Controller
{
    public function createForm()
    {
        return view('detailing.create');
    }

    public function editForm(Detailing $detailing)
    {
        //$detailing = Detailing::query()->findOrFail($id);
        return view('detailing.edit', compact('detailing'));
    }

    public function delete(Detailing $detailing)
    {
        // $detailing = Detailing::query()->findOrFail($id)->delete();
        $detailing->delete();

        return redirect()->route('detailing.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $detailing = new Detailing($data);
        $detailing->save();

        session()->flash('success', 'Success!');

        return redirect()->route('detailing.show', ['detailing' => $detailing->id]);
    }

    public function edit(Detailing $detailing, EditRequest $request)
    {
        //$detailing = Detailing::query()->findOrFail($id);
        $data = $request->validated();
        $detailing->fill($data);
        $detailing->save();

        session()->flash('success', 'Success!');

        return redirect()->route('detailing.show', ['detailing' => $detailing->id]);
    }

    public function list()
    {
        $detailings = Detailing::paginate(5);

        return view('detailing.list', ['detailings' => $detailings]);
    }

    public function show(Detailing $detailing)
    {
        //$detailing = Detailing::query()->findOrFail($id);

        return view('detailing.show', compact('detailing'));
    }
}
