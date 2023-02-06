<?php

namespace App\Http\Controllers;

use App\Http\Requests\Item\CreateRequest;
use App\Http\Requests\Item\EditRequest;
use App\Models\Item;
use App\Services\ItemService;

class ItemController extends Controller
{
    public function __construct(private ItemService $itemService)
    {
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $item = $this->itemService->create($data);

        session()->flash('success', 'Success!');

        return redirect()->route('item.show', ['item' => $item->id]);
    }

    public function edit(Item $item, EditRequest $request)
    {
        $data = $request->validated();
        $this->itemService->edit($item, $data);

        session()->flash('success', 'Success!');

        return redirect()->route('item.show', ['item' => $item->id]);
    }

    public function delete(Item $item)
    {
        $this->itemService->delete($item);

        return redirect()->route('item.list');
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
