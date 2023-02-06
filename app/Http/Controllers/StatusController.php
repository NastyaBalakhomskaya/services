<?php

namespace App\Http\Controllers;

use App\Http\Requests\Status\CreateRequest;
use App\Http\Requests\Status\EditRequest;
use App\Models\Status;
use App\Services\StatusService;

class StatusController extends Controller
{
    public function __construct(private StatusService $statusService)
    {
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $status = $this->statusService->create($data);

        session()->flash('success', 'Success!');

        return redirect()->route('status.show', ['status' => $status->id]);
    }

    public function edit(Status $status, EditRequest $request)
    {
        $data = $request->validated();
        $this->statusService->edit($status, $data);

        session()->flash('success', 'Success!');

        return redirect()->route('status.show', ['status' => $status->id]);
    }

    public function delete(Status $status)
    {
        $this->statusService->delete($status);

        return redirect()->route('status.list');
    }

    public function createForm()
    {
        return view('status.create');
    }

    public function editForm(Status $status)
    {
        return view('status.edit', compact('status'));
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
