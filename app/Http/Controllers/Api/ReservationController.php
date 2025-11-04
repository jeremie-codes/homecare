<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'client_id' => 'required|exists:clients,id',
                'agent_id' => 'required|exists:agents,id',
                'service_id' => 'required|exists:services,id',
                'frequence' => 'required|string',
                'date_reservation' => 'required|date',
                'adresse' => 'required|string',
                'duree' => 'required|string',
                'urgence' => 'nullable|boolean',
                'transport_inclus' => 'nullable|boolean',
                'nombre_personnes' => 'nullable|integer',
                'taches_specifiques' => 'nullable|string',
                'taille_logement' => 'nullable|string',
                'conditions_particulieres' => 'nullable|string',
                'phone' => 'required|string',
            ]);

            $data['date_reservation'] = date('Y-m-d H:i:s', strtotime($data['date_reservation']));

            $reservation = Reservation::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Réservation enregistrée avec succès',
                'reservation' => $reservation
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la réservation', 'message' => $e->getMessage()], 500);
        }
    }

    public function getByClient($client_id)
    {
        try {
            $reservations = Reservation::with(['service', 'agent.user'])
                ->where('client_id', $client_id)
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json($reservations);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors du chargement des réservations', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $reservation = Reservation::with(['service', 'agent.user', 'client.user'])
                ->findOrFail($id);
            return response()->json($reservation);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Réservation introuvable', 'message' => $e->getMessage()], 404);
        }
    }

}
