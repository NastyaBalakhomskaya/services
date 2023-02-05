<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Status\CreateRequest;
use App\Http\Requests\Api\Status\EditRequest;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use App\Services\StatusService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
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

    public function list(): AnonymousResourceCollection
    {
        $statuses = Status::query()->latest()->paginate(3);

        return StatusResource::collection($statuses);
    }

    public function show(Status $status): StatusResource
    {
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
}
