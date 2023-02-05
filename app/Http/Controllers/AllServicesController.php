<?php

namespace App\Http\Controllers;

use App\Models\Detailing;
use App\Models\Service;
use App\Models\Tire;

class AllServicesController extends Controller
{
    public function price()
    {
        $detailings = Detailing::all();
        $services = Service::all();
        $tires = Tire::all();

        return view('price', compact('services', 'detailings', 'tires'));
    }
}
