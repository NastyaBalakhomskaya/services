<?php

namespace App\Http\Controllers;

use App\Models\Detailing;

class PriceDetailingsController extends Controller
{
    public function price()
    {
        $detailings = Detailing::all();

        return view('price-detailings', compact('detailings'));
    }
}
