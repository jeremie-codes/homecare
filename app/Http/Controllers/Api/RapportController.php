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

            return response()->json(['message' => 'Rapport envoyé avec succès.'], 201);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Erreur lors de l’envoi du rapport.',
                'details' => $e->getMessage()
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
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
