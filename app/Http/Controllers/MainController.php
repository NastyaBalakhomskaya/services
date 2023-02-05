<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Detailing;
use App\Models\Order;
use App\Models\Service;
use App\Models\Tire;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query()
            ->with(['user', 'services', 'detailings', 'tires'])
            ->latest();

        if ($request->has('services')) {
            $query->whereHas('services', function ($q) use ($request) {
                $q->whereIn('services.id', $request->get('services'));
            });
        }

        if ($request->has('detailings')) {
            $query->whereHas('detailings', function ($q) use ($request) {
                $q->whereIn('detailings.id', $request->get('detailings'));
            });
        }

        if ($request->has('tires')) {
            $query->whereHas('tires', function ($q) use ($request) {
                $q->whereIn('tires.id', $request->get('tires'));
            });
        }

        if ($request->has('cars')) {
            $query->whereHas('cars', function ($q) use ($request) {
                $q->whereIn('cars.id', $request->get('cars'));
            });
        }

        if ($request->has('title')) {
            $search = '%'.$request->get('title').'%';
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', $search);
            });
        }

        if ($request->has('status')) {
            $search = '%'.$request->get('status').'%';
            $query->where(function ($q) use ($search) {
                $q->where('status', 'like', $search);
            });
        }

        $orders = $query
            ->paginate(3)
            ->appends($request->query());

        $services = Service::all();
        $detailings = Detailing::all();
        $tires = Tire::all();
        $cars = Car::all();

        return view('home', compact('orders', 'services', 'detailings', 'tires', 'cars'));
    }
}
