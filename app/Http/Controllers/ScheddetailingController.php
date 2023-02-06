<?php

namespace App\Http\Controllers;

use App\Http\Requests\Scheddetailing\CreateRequest;
use App\Http\Requests\Scheddetailing\EditRequest;
use App\Models\Scheddetailing;
use App\Services\ScheddetailingService;

class ScheddetailingController extends Controller
{
    public function __construct(private ScheddetailingService $scheddetailingService)
    {
    }

    public function delete(Scheddetailing $scheddetailing)
    {
        $this->scheddetailingService->delete($scheddetailing);

        return redirect()->route('scheddetailing.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $scheddetailing = $this->scheddetailingService->create($data);

        session()->flash('success', 'Success!');

        return redirect()->route('scheddetailing.show', ['scheddetailing' => $scheddetailing->id]);
    }

    public function edit(Scheddetailing $scheddetailing, EditRequest $request)
    {
        $data = $request->validated();
        $this->scheddetailingService->edit($scheddetailing, $data);

        session()->flash('success', 'Success!');

        return redirect()->route('scheddetailing.show', ['scheddetailing' => $scheddetailing->id]);
    }

    public function createForm()
    {
        return view('scheddetailing.create');
    }

    public function editForm(Scheddetailing $scheddetailing)
    {
        return view('scheddetailing.edit', compact('scheddetailing'));
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
