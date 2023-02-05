<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Schedservice\CreateRequest;
use App\Http\Requests\Api\Schedservice\EditRequest;
use App\Http\Resources\SchedserviceResource;
use App\Models\Schedservice;
use App\Services\SchedserviceService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class SchedserviceController extends Controller
{
    public function __construct(private SchedserviceService $schedserviceService)
    {
    }

    public function create(CreateRequest $request): SchedserviceResource
    {
        $data = $request->validated();
        $schedservice = $this->schedserviceService->create($data);

        return new SchedserviceResource($schedservice);
    }

    public function edit(Schedservice $schedservice, EditRequest $request): SchedserviceResource
    {
        $data = $request->validated();
        $this->schedserviceService->edit($schedservice, $data);

        return new SchedserviceResource($schedservice);
    }

    public function list(): AnonymousResourceCollection
    {
        $schedservices = Schedservice::query()->latest()->paginate(3);

        return SchedserviceResource::collection($schedservices);
    }

    public function show(Schedservice $schedservice): SchedserviceResource
    {
        return new SchedserviceResource($schedservice);
    }

    public function delete(Schedservice $schedservice): Response
    {
        $this->schedserviceService->delete($schedservice);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
    }
}
