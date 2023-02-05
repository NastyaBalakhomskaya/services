<?php

namespace App\Http\Controllers;

use App\Models\Service;

class PriceServicesController extends Controller
{
    public function price()
    {
        $services = Service::all();

        return view('price-services', compact('services'));
    }
}
