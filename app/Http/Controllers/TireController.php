<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tire\CreateRequest;
use App\Http\Requests\Tire\EditRequest;
use App\Http\Resources\TireResource;
use App\Models\Tire;
use App\Services\TireService;
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

    public function delete(Tire $tire): Response
    {
        $this->tireService->delete($tire);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
    }

    public function createForm()
    {
        return view('tire.create');
    }

    public function editForm(Tire $tire)
    {
        return view('tire.edit', compact('tire'));
    }

    public function list()
    {
        $tires = Tire::paginate(5);

        return view('tire.list', ['tires' => $tires]);
    }

    public function show(Tire $tire)
    {
        return view('tire.show', compact('tire'));
    }
}
