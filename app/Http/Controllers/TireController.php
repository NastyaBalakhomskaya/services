<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tire\CreateRequest;
use App\Http\Requests\Tire\EditRequest;
use App\Models\Tire;
use App\Services\TireService;

class TireController extends Controller
{
    public function __construct(private TireService $tireService)
    {
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $tire = $this->tireService->create($data);

        session()->flash('success', 'Success!');

        return redirect()->route('tire.show', ['tire' => $tire->id]);
    }

    public function edit(Tire $tire, EditRequest $request)
    {
        $data = $request->validated();
        $this->tireService->edit($tire, $data);

        session()->flash('success', 'Success!');

        return redirect()->route('tire.show', ['tire' => $tire->id]);
    }

    public function delete(Tire $tire)
    {
        $this->tireService->delete($tire);

        return redirect()->route('tire.list');
    }

    public function createForm()
    {
        return view('tire.create');
    }

    public function editForm(Tire $tire)
    {
        return view('tire.edit', compact('tire'));
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
