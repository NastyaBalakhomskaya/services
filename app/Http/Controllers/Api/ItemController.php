<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Item\CreateRequest;
use App\Http\Requests\Api\Item\EditRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Services\ItemService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    public function __construct(private ItemService $itemService)
    {
    }

    public function create(CreateRequest $request): ItemResource
    {
        $data = $request->validated();
        $item = $this->itemService->create($data);

        return new ItemResource($item);
    }

    public function edit(Item $item, EditRequest $request): ItemResource
    {
        $data = $request->validated();
        $this->itemService->edit($item, $data);

        return new ItemResource($item);
    }

    public function list(): AnonymousResourceCollection
    {
        $items = Item::query()->latest()->paginate(3);

        return ItemResource::collection($items);
    }

    public function show(Item $item): ItemResource
    {
        return new ItemResource($item);
    }

    public function delete(Item $item): Response
    {
        $this->itemService->delete($item);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
    }
}
