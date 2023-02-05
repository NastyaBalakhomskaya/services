<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Order\CreateRequest;
use App\Http\Requests\Api\Order\EditRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function __construct(private OrderService $orderService)
    {
    }

    public function create(CreateRequest $request): OrderResource
    {
        $data = $request->validated();
        $user = $request->user();
        $order = $this->orderService->create($data, $user);

        return new OrderResource($order);
    }

    public function edit(Order $order, EditRequest $request): OrderResource
    {
        $data = $request->validated();
        $this->orderService->edit($order, $data);

        return new OrderResource($order);
    }

    public function list(): AnonymousResourceCollection
    {
        $orders = Order::query()->with(['user'])->latest()->paginate(3);

        return OrderResource::collection($orders);
    }

    public function show(Order $order): OrderResource
    {
        return new OrderResource($order);
    }

    public function delete(Order $order): Response
    {
        $this->orderService->delete($order);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 204);
    }
}
