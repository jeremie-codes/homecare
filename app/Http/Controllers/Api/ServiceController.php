<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        try {
            $services = Service::with(['taches'])
                ->where('is_actif', true)->orderBy('created_at', 'desc')
                ->get();

            return response()->json($services);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors du chargement des services', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $service = Service::with(['taches'])->findOrFail($id);
            return response()->json($service);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Service introuvable', 'message' => $e->getMessage()], 404);
        }
    }
}
