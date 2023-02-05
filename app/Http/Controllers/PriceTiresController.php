<?php

namespace App\Http\Controllers;

use App\Models\Tire;

class PriceTiresController extends Controller
{
    public function price()
    {
        $tires = Tire::all();

        return view('price-tires', compact('tires'));
    }
}
