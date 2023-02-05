<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Service\CreateRequest;
use App\Http\Requests\Api\Service\EditRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Services\ServiceService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    public function __construct(private ServiceService $serviceService)
    {
    }

    public function create(CreateRequest $request): ServiceResource
    {
        $data = $request->validated();
        $service = $this->serviceService->create($data);

        return new ServiceResource($service);
    }

    public function edit(Service $service, EditRequest $request): ServiceResource
    {
        $data = $request->validated();
        $this->serviceService->edit($service, $data);

        return new ServiceResource($service);
    }

    public function list(): AnonymousResourceCollection
    {
        $services = Service::query()->latest()->paginate(3);

        return ServiceResource::collection($services);
    }

    public function show(Service $service): ServiceResource
    {
        return new ServiceResource($service);
    }

    public function delete(Service $service): Response
    {
        $this->serviceService->delete($service);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
    }
}
