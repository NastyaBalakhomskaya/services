<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Detailing\CreateRequest;
use App\Http\Requests\Api\Detailing\EditRequest;
use App\Http\Resources\DetailingResource;
use App\Models\Detailing;
use App\Services\DetailingService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class DetailingController extends Controller
{
    public function __construct(private DetailingService $detailingService)
    {
    }

    public function create(CreateRequest $request): DetailingResource
    {
        $data = $request->validated();
        $detailing = $this->detailingService->create($data);

        return new DetailingResource($detailing);
    }

    public function edit(Detailing $detailing, EditRequest $request): DetailingResource
    {
        $data = $request->validated();
        $this->detailingService->edit($detailing, $data);

        return new DetailingResource($detailing);
    }

    public function list(): AnonymousResourceCollection
    {
        $detailings = Detailing::query()->latest()->paginate(3);

        return DetailingResource::collection($detailings);
    }

    public function show(Detailing $detailing): DetailingResource
    {
        return new DetailingResource($detailing);
    }

    public function delete(Detailing $detailing): Response
    {
        $this->detailingService->delete($detailing);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
    }
}
