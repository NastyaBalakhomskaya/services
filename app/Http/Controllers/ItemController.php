<?php

namespace App\Http\Controllers;

use App\Http\Requests\Item\CreateRequest;
use App\Http\Requests\Item\EditRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Services\ItemService;
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

    public function delete(Item $item): Response
    {
        $this->itemService->delete($item);
        $data = [
            'message' => 'success',
        ];

        return response($data, status: 200);
    }

    public function createForm()
    {
        return view('item.create');
    }

    public function editForm(Item $item)
    {
        return view('item.edit', compact('item'));
    }

    public function list()
    {
        $items = Item::paginate(5);

        return view('item.list', ['items' => $items]);
    }

    public function show(Item $item)
    {
        return view('item.show', compact('item'));
    }
}
