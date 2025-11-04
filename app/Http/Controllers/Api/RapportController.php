<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rapport;
use Illuminate\Http\Request;
use Exception;

class RapportController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'type' => 'required|in:aide,plainte',
                'description' => 'required|string',
            ]);

            Rapport::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Rapport envoyé avec succès.'
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de l’envoi du rapport.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        try {
            $rapports = Rapport::with('user')->latest()->get();
            return response()->json($rapports);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Impossible de charger les rapports.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
