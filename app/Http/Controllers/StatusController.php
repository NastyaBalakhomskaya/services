<?php

namespace App\Http\Controllers;

use App\Http\Requests\Status\CreateRequest;
use App\Http\Requests\Status\EditRequest;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use App\Services\StatusService;
use Illuminate\Http\Response;

class StatusController extends Controller
{
    public function __construct(private StatusService $statusService)
    {
    }

    public function create(CreateRequest $request): StatusResource
    {
        $data = $request->validated();
        $status = $this->statusService->create($data);

        return new StatusResource($status);
    }

    public function edit(Status $status, EditRequest $request): StatusResource
    {
        $data = $request->validated();
        $this->statusService->edit($status, $data);

        return new StatusResource($status);
    }

    public function delete(Status $status): Response
    {
        $this->statusService->delete($status);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
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
