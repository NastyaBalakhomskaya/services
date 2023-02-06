<?php

namespace App\Http\Controllers;

use App\Http\Requests\Schedtire\CreateRequest;
use App\Http\Requests\Schedtire\EditRequest;
use App\Http\Resources\SchedtireResource;
use App\Models\Schedtire;
use App\Services\SchedtireService;
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

    public function delete(Schedtire $schedtire): Response
    {
        $this->schedtireService->delete($schedtire);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
    }

    public function createForm()
    {
        return view('schedtire.create');
    }

    public function editForm(Schedtire $schedtire)
    {
        return view('schedtire.edit', compact('schedtire'));
    }

    public function list()
    {
        $schedtires = Schedtire::paginate(5);

        return view('schedtire.list', ['schedtires' => $schedtires]);
    }

    public function show(Schedtire $schedtire)
    {
        return view('schedtire.show', compact('schedtire'));
    }
}
