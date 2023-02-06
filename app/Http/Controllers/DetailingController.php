<?php

namespace App\Http\Controllers;

use App\Http\Requests\Detailing\CreateRequest;
use App\Http\Requests\Detailing\EditRequest;
use App\Models\Detailing;
use App\Services\DetailingService;

class DetailingController extends Controller
{
    public function __construct(private DetailingService $detailingService)
    {
    }

    public function delete(Detailing $detailing)
    {
        $this->detailingService->delete($detailing);

        return redirect()->route('detailing.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $detailing = $this->detailingService->create($data);

        session()->flash('success', 'Success!');

        return redirect()->route('detailing.show', ['detailing' => $detailing->id]);
    }

    public function edit(Detailing $detailing, EditRequest $request)
    {
        $data = $request->validated();
        $this->detailingService->edit($detailing, $data);

        session()->flash('success', 'Success!');

        return redirect()->route('detailing.show', ['detailing' => $detailing->id]);
    }

    public function createForm()
    {
        return view('detailing.create');
    }

    public function editForm(Detailing $detailing)
    {
        //$detailing = Detailing::query()->findOrFail($id);
        return view('detailing.edit', compact('detailing'));
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
