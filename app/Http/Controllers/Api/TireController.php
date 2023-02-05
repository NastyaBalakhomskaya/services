<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Tire\CreateRequest;
use App\Http\Requests\Api\Tire\EditRequest;
use App\Http\Resources\TireResource;
use App\Models\Tire;
use App\Services\TireService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TireController extends Controller
{
    public function __construct(private TireService $tireService)
    {
    }

    public function create(CreateRequest $request): TireResource
    {
        $data = $request->validated();
        $tire = $this->tireService->create($data);

        return new TireResource($tire);
    }

    public function edit(Tire $tire, EditRequest $request): TireResource
    {
        $data = $request->validated();
        $this->tireService->edit($tire, $data);

        return new TireResource($tire);
    }

    public function list(): AnonymousResourceCollection
    {
        $tires = Tire::query()->latest()->paginate(3);

        return TireResource::collection($tires);
    }

    public function show(Tire $tire): TireResource
    {
        return new TireResource($tire);
    }

    public function delete(Tire $tire): Response
    {
        $this->tireService->delete($tire);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
    }
}
