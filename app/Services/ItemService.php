<?php

namespace App\Services;

use App\Models\Item;

class ItemService
{
    public function create(array $data): Item
    {
        $item = new Item($data);
        $item->save();

        return $item;
    }

    public function edit(Item $item, array $data): void
    {
        $item->fill($data);
        $item->save();
    }

    public function delete(Item $item): void
    {
        $item->delete();
    }
}
