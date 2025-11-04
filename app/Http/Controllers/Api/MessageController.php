<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getByUser($user_id)
    {
        try {
            $messages = Message::with('user', 'user.agent', 'user.client')
                ->where('sender_id', $user_id)
                ->orWhere('receiver_id', $user_id)
                ->orderBy('created_at', 'asc')
                ->get();

            return response()->json($messages);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors du chargement des messages', 'message' => $e->getMessage()], 500);
        }
    }

     // Envoi d'un message
    public function send(Request $request, $sender_id)
    {
        try {
            $data = $request->validate([
                'receiverId' => 'required|exists:users,id',
                'text' => 'required|string',
            ]);

            $message = Message::create([
                'sender_id' => $sender_id,
                'receiver_id' => $data['receiverId'],
                'content' => $data['text'],
                'is_read' => false,
            ]);

            return response()->json(['success' => true, 'message' => $message]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Impossible d\'envoyer le message',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Récupération conversation entre 2 utilisateurs
    public function getConversation($sender_id, $receiver_id)
    {
        try {
            $messages = Message::with('user')
                ->where(function ($query) use ($sender_id, $receiver_id) {
                    $query->where('sender_id', $sender_id)
                          ->where('receiver_id', $receiver_id);
                })
                ->orWhere(function ($query) use ($sender_id, $receiver_id) {
                    $query->where('sender_id', $receiver_id)
                          ->where('receiver_id', $sender_id);
                })
                ->orderBy('created_at', 'asc')
                ->get();

            return response()->json($messages);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors du chargement de la conversation',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
