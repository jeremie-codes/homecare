<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Contact;
use App\Models\Pricing;
use App\Models\Service;
use Illuminate\Http\Request;

class RouteController
{
    public function index()
    {
        $services = Service::paginate(8);
        $pricings = Pricing::paginate(3);

        return view('index', compact('services', 'pricings'));
    }

    public function team()
    {
        $agents = Agent::with('user', 'category', 'service')->paginate(6);

        return view('team', compact('agents'));
    }

    public function contact(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required',
            ]);

            Contact::create($request->all());

            return back()->with('success', 'Message envoyé avec success!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

}
