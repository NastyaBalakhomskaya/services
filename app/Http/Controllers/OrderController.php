<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\CreateRequest;
use App\Http\Requests\Order\EditRequest;
use App\Models\Car;
use App\Models\Detailing;
use App\Models\Order;
use App\Models\Service;
use App\Models\Tire;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private OrderService $orderService)
    {
    }

    public function createForm()
    {
        $detailings = Detailing::all();
        $services = Service::all();
        $tires = Tire::all();
        $cars = Car::all();

        return view('orders.create', compact('services', 'detailings', 'tires', 'cars'));
    }

    public function editForm(Order $order)
    {
        $detailings = Detailing::all();
        $services = Service::all();
        $tires = Tire::all();
        $cars = Car::all();

        return view('orders.edit', compact('order', 'detailings', 'services', 'tires', 'cars'));
    }

    public function delete(Order $order)
    {
        $this->orderService->delete($order);
        session()->flash('success', 'Success!');

        return redirect()->route('order.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $user = $request->user();
        $order = $this->orderService->create($data, $user);

        session()->flash('success', 'Success!');

        return redirect()->route('order.show', ['order' => $order->id]);
    }

    public function edit(Order $order, EditRequest $request)
    {
        $data = $request->validated();
        $this->orderService->edit($order, $data);

        session()->flash('success', 'Success!');

        return redirect()->route('order.show', ['order' => $order->id]);
    }

    public function list(Request $request)
    {
        // $orders = Order::all(); для отображения списка заказов без пагинации
        $orders = Order::query()->with(['user'])->paginate(4);

        return view('orders.list', ['orders' => $orders]);
    }

    public function show(Order $order)
    {
        //$order = Order::query()->findOrFail($id);
        return view('orders.show', compact('order'));
    }
}
