<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use App\Models\Service;

class RouteController
{
    public function index()
    {
        $services = Service::paginate(8);
        $pricings = Pricing::paginate(3);

        return view('index', compact('services', 'pricings'));
    }
}
