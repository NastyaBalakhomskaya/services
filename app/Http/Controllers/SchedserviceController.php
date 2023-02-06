<?php

namespace App\Http\Controllers;

use App\Http\Requests\Schedservice\CreateRequest;
use App\Http\Requests\Schedservice\EditRequest;
use App\Models\Schedservice;
use App\Services\SchedserviceService;

class SchedserviceController extends Controller
{
    public function __construct(private SchedserviceService $schedserviceService)
    {
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $schedservice = $this->schedserviceService->create($data);

        session()->flash('success', 'Success!');

        return redirect()->route('schedservice.show', ['schedservice' => $schedservice->id]);
    }

    public function edit(Schedservice $schedservice, EditRequest $request)
    {
        $data = $request->validated();
        $this->schedserviceService->edit($schedservice, $data);

        session()->flash('success', 'Success!');

        return redirect()->route('schedservice.show', ['schedservice' => $schedservice->id]);
    }

    public function delete(Schedservice $schedservice)
    {
        $this->schedserviceService->delete($schedservice);

        return redirect()->route('schedservice.list');
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
