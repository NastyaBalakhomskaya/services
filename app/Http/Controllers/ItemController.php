<?php

namespace App\Http\Controllers;

use App\Http\Requests\Item\CreateRequest;
use App\Http\Requests\Item\EditRequest;
use App\Models\Item;

class ItemController extends Controller
{
    public function createForm()
    {
        return view('item.create');
    }

    public function editForm(Item $item)
    {
        return view('item.edit', compact('item'));
    }

    public function delete(Item $item)
    {
        $item->delete();

        return redirect()->route('item.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $item = new Item($data);
        $item->save();

        session()->flash('success', 'Success!');

        return redirect()->route('item.show', ['item' => $item->id]);
    }

    public function edit(Item $item, EditRequest $request)
    {
        $data = $request->validated();
        $item->fill($data);
        $item->save();

        session()->flash('success', 'Success!');

        return redirect()->route('item.show', ['item' => $item->id]);
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
