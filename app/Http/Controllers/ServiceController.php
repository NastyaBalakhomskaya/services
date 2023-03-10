<?php

namespace App\Http\Controllers;

use App\Http\Requests\Service\CreateRequest;
use App\Http\Requests\Service\EditRequest;
use App\Models\Service;
use App\Services\ServiceService;

class ServiceController extends Controller
{
    public function __construct(private ServiceService $serviceService)
    {
    }

    public function createForm()
    {
        return view('services.create');
    }

    public function editForm(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function delete(Service $service)
    {
        $service->delete();

        return redirect()->route('service.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $service = $this->serviceService->create($data);

        session()->flash('success', 'Success!');

        return redirect()->route('service.show', ['service' => $service->id]);
    }

    public function edit(Service $service, EditRequest $request)
    {
        $data = $request->validated();
        $this->serviceService->edit($service, $data);

        session()->flash('success', 'Success!');

        return redirect()->route('service.show', ['service' => $service->id]);
    }

    public function list()
    {
        $services = Service::paginate(5);

        return view('services.list', ['services' => $services]);
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }
}
