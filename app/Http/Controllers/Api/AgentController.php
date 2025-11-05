<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function getByService($service_id)
    {
        try {
            $agents = Agent::with('user', 'category')
                ->where('service_id', $service_id)
                ->where('statut', 'disponible')
                ->where('is_badges', true)
                ->get();

            return response()->json($agents);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors du chargement des agents', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $agent = Agent::with(['user', 'service', 'category'])->findOrFail($id);
            return response()->json($agent);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Agent introuvable', 'message' => $e->getMessage()], 404);
        }
    }
}
