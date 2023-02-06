<?php

namespace App\Http\Controllers;

use App\Http\Requests\Schedservice\CreateRequest;
use App\Http\Requests\Schedservice\EditRequest;
use App\Http\Resources\SchedserviceResource;
use App\Models\Schedservice;
use App\Services\SchedserviceService;
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

    public function delete(Schedservice $schedservice): Response
    {
        $this->schedserviceService->delete($schedservice);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
    }

    public function createForm()
    {
        return view('schedservice.create');
    }

    public function editForm(Schedservice $schedservice)
    {
        return view('schedservice.edit', compact('schedservice'));
    }

    public function list()
    {
        $schedservices = Schedservice::paginate(5);

        return view('schedservice.list', ['schedservices' => $schedservices]);
    }

    public function show(Schedservice $schedservice)
    {
        return view('schedservice.show', compact('schedservice'));
    }
}
