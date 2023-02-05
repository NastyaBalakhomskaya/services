<?php

namespace App\Http\Controllers;

use App\Http\Requests\Status\CreateRequest;
use App\Http\Requests\Status\EditRequest;
use App\Models\Status;

class StatusController extends Controller
{
    public function createForm()
    {
        return view('status.create');
    }

    public function editForm(Status $status)
    {
        return view('status.edit', compact('status'));
    }

    public function delete(Status $status)
    {
        $status->delete();

        return redirect()->route('status.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $status = new Status($data);
        $status->save();

        session()->flash('success', 'Success!');

        return redirect()->route('status.show', ['status' => $status->id]);
    }

    public function edit(Status $status, EditRequest $request)
    {
        $data = $request->validated();
        $status->fill($data);
        $status->save();

        session()->flash('success', 'Success!');

        return redirect()->route('status.show', ['status' => $status->id]);
    }

    public function list()
    {
        $statuses = Status::paginate(5);

        return view('status.list', ['statuses' => $statuses]);
    }

    public function show(Status $status)
    {
        return view('status.show', compact('status'));
    }
}
