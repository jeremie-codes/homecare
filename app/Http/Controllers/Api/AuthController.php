<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->orWhere('phone', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Identifiants invalides'], 401);
        }

        // Génération d’un token si tu utilises Sanctum
        $token = $user->createToken('auth_token')->plainTextToken;

        // Récupération du profil lié (Agent ou Client)
        $profile = $user->role === 'agent' ? $user->agent : $user->client;

        return response()->json([
            'token' => $token,
            'user' => $user,
            'profile' => $profile,
        ]);
    }

        /**
     * 🔹 Supprime le compte utilisateur
     */
    public function deleteAccount(Request $request)
    {
        try {
            $user = $request->user();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Utilisateur non authentifié.',
                ], 401);
            }

            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'Compte supprimé avec succès.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression du compte.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * 🔹 Déconnexion (logout)
     * Supprime le token actuel de l'utilisateur (utile pour mobile)
     */
    public function logout(Request $request)
    {
        try {
            $user = $request->user();

            if ($user) {
                // Si tu utilises sanctum :
                $user->currentAccessToken()->delete();

                return response()->json([
                    'success' => true,
                    'message' => 'Déconnexion réussie.',
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Aucun utilisateur connecté.',
            ], 401);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la déconnexion.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
