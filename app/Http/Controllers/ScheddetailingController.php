<?php

namespace App\Http\Controllers;

use App\Http\Requests\Scheddetailing\CreateRequest;
use App\Http\Requests\Scheddetailing\EditRequest;
use App\Http\Resources\ScheddetailingResource;
use App\Models\Scheddetailing;
use App\Services\ScheddetailingService;
use Illuminate\Http\Response;

class ScheddetailingController extends Controller
{
    public function __construct(private ScheddetailingService $scheddetailingService)
    {
    }

    public function delete(Scheddetailing $scheddetailing): Response
    {
        $this->scheddetailingService->delete($scheddetailing);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
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

    public function createForm()
    {
        return view('scheddetailing.create');
    }

    public function editForm(Scheddetailing $scheddetailing)
    {
        return view('scheddetailing.edit', compact('scheddetailing'));
    }

    public function list()
    {
        $scheddetailings = Scheddetailing::paginate(5);

        return view('scheddetailing.list', ['scheddetailings' => $scheddetailings]);
    }

    public function show(Scheddetailing $scheddetailing)
    {
        return view('scheddetailing.show', compact('scheddetailing'));
    }
}
