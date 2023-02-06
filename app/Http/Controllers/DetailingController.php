<?php

namespace App\Http\Controllers;

use App\Http\Requests\Detailing\CreateRequest;
use App\Http\Requests\Detailing\EditRequest;
use App\Http\Resources\DetailingResource;
use App\Models\Detailing;
use App\Services\DetailingService;
use Illuminate\Http\Response;

class DetailingController extends Controller
{
    public function __construct(private DetailingService $detailingService)
    {
    }

    public function delete(Detailing $detailing): Response
    {
        $this->detailingService->delete($detailing);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
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

    public function createForm()
    {
        return view('detailing.create');
    }

    public function editForm(Detailing $detailing)
    {
        //$detailing = Detailing::query()->findOrFail($id);
        return view('detailing.edit', compact('detailing'));
    }

    public function list()
    {
        $detailings = Detailing::paginate(5);

        return view('detailing.list', ['detailings' => $detailings]);
    }

    public function show(Detailing $detailing)
    {
        //$detailing = Detailing::query()->findOrFail($id);

        return view('detailing.show', compact('detailing'));
    }
}
