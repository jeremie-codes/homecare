<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AccountController extends Controller
{
    /**
     * 🔹 Mise à jour du profil utilisateur
     */
    public function updateAccount(Request $request)
    {
        try {
            $user = $request->user();

            // Validation des champs
            $request->validate([
                'name' => 'sometimes|string|max:255',
                'email' => 'sometimes|email|max:255|unique:users,email,' . $user->id,
                'phone' => 'sometimes|string|max:20',
                'adresse' => 'nullable|string|max:255',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Gestion de l'image si elle existe
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');

                // Nom unique pour éviter les conflits
                $fileName = 'avatar_' . Str::random(8) . '.' . $file->getClientOriginalExtension();

                // Dossier de destination : public/uploads/avatars/
                $destinationPath = public_path('uploads/avatars');

                // Création du dossier s’il n’existe pas
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                // Déplacement du fichier
                $file->move($destinationPath, $fileName);

                // Suppression de l'ancienne image si elle existe
                if ($user->avatar && file_exists(public_path($user->avatar))) {
                    @unlink(public_path($user->avatar));
                }

                // Enregistrement du chemin dans la base
                $user->avatar = 'uploads/avatars/' . $fileName;
            }

            // Mise à jour des autres champs
            $user->update($request->only(['name', 'email', 'phone', 'adresse']));

            $user->save();

            return response()->json([
                'message' => 'Profil mis à jour avec succès',
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur,' . $e->getMessage()], 500);
        }
    }

    /**
     * 🔹 Mise à jour du mot de passe
     */
    public function updatePassword(Request $request)
    {
        try {
            $request->validate([
                'oldPassword' => 'required|string',
                'newpassword' => 'required|string|min:6',
            ]);

            $user = $request->user();

            if (!Hash::check($request->oldPassword, $user->password)) {
                return response()->json(['message' => 'Ancien mot de passe incorrect'], 401);
            }

            $user->update(['password' => Hash::make($request->newpassword)]);

            return response()->json(['message' => 'Mot de passe mis à jour avec succès']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur,' . $e->getMessage()], 500);
        }
    }

    /**
     * 🔹 Suppression du compte utilisateur
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
                'error' => $e->getMessage(), // optionnel, utile en développement
            ], 500);
        }
    }


}
