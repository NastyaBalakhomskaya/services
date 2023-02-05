<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Schedtire\CreateRequest;
use App\Http\Requests\Api\Schedtire\EditRequest;
use App\Http\Resources\SchedtireResource;
use App\Models\Schedtire;
use App\Services\SchedtireService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class SchedtireController extends Controller
{
    public function __construct(private SchedtireService $schedtireService)
    {
    }

    public function create(CreateRequest $request): SchedtireResource
    {
        $data = $request->validated();
        $schedtire = $this->schedtireService->create($data);

        return new SchedtireResource($schedtire);
    }

    public function edit(Schedtire $schedtire, EditRequest $request): SchedtireResource
    {
        $data = $request->validated();
        $this->schedtireService->edit($schedtire, $data);

        return new SchedtireResource($schedtire);
    }

    public function list(): AnonymousResourceCollection
    {
        $schedtires = Schedtire::query()->latest()->paginate(3);

        return SchedtireResource::collection($schedtires);
    }

    public function show(Schedtire $schedtire): SchedserviceResource
    {
        return new SchedtireResource($schedtire);
    }

    public function delete(Schedtire $schedtire): Response
    {
        $this->schedtireService->delete($schedtire);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
    }
}
