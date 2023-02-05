<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Scheddetailing\CreateRequest;
use App\Http\Requests\Api\Scheddetailing\EditRequest;
use App\Http\Resources\ScheddetailingResource;
use App\Models\Scheddetailing;
use App\Services\ScheddetailingService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ScheddetailingController extends Controller
{
    public function __construct(private ScheddetailingService $scheddetailingService)
    {
    }

    public function create(CreateRequest $request): ScheddetailingResource
    {
        $data = $request->validated();
        $scheddetailing = $this->scheddetailingService->create($data);

        return new ScheddetailingResource($scheddetailing);
    }

    public function edit(Scheddetailing $scheddetailing, EditRequest $request): ScheddetailingResource
    {
        $data = $request->validated();
        $this->scheddetailingService->edit($scheddetailing, $data);

        return new ScheddetailingResource($scheddetailing);
    }

    public function list(): AnonymousResourceCollection
    {
        $scheddetailings = Scheddetailing::query()->latest()->paginate(3);

        return ScheddetailingResource::collection($scheddetailings);
    }

    public function show(Scheddetailing $scheddetailing): ScheddetailingResource
    {
        return new ScheddetailingResource($scheddetailing);
    }

    public function delete(Scheddetailing $scheddetailing): Response
    {
        $this->scheddetailingService->delete($scheddetailing);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
    }
}
