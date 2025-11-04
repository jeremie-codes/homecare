<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TacheAgent;
use App\Models\Agent;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Ajouter une tâche pour un agent
    public function addTask(Request $request, $clientId)
    {
        try {
            $data = $request->validate([
                'agentId' => 'required|exists:agents,id',
                'task' => 'required|string',
            ]);

            $task = TacheAgent::create([
                'client_id' => $clientId,
                'agent_id' => $data['agentId'],
                'title' => $data['task'],
                'done' => false,
            ]);

            return response()->json(['success' => true, 'task' => $task]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Impossible d\'ajouter la tâche', 'message' => $e->getMessage()], 500);
        }
    }

    // Supprimer une tâche
    public function deleteTask($taskId)
    {
        try {
            $task = TacheAgent::findOrFail($taskId);
            $task->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Impossible de supprimer la tâche', 'message' => $e->getMessage()], 500);
        }
    }

    // Récupérer les tâches d’un agent
    public function getTaskByAgentId($agentId)
    {
        try {
            $tasks = TacheAgent::with('agent')->where('agent_id', $agentId)->get();
            return response()->json($tasks);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Impossible de récupérer les tâches', 'message' => $e->getMessage()], 500);
        }
    }

    // Basculer le statut "done" d’une tâche
    public function toggleDone($id)
    {
        try {
            $task = TacheAgent::findOrFail($id);
            $task->done = !$task->done;
            $task->save();
            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(false, 500);
        }
    }

    // Agents recommandés par le client
    public function getAgentRecommendedByClient($clientId)
    {
        try {
            $agents = Agent::where('recommended_by', $clientId)->get();
            return response()->json([
                "success" => true,
                "agents" => $agents
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Impossible de récupérer les agents recommandés', 'message' => $e->getMessage()], 500);
        }
    }

    // Noter un agent
    public function ratingAgent(Request $request, $agentId)
    {
        try {
            $data = $request->validate([
                'client_id' => 'required|exists:clients,id',
                'rating' => 'required|numeric|min:1|max:5',
                'commentaire' => 'nullable|string',
            ]);

            $evaluation = \App\Models\Evaluation::updateOrCreate(
                ['client_id' => $data['client_id'], 'agent_id' => $agentId],
                ['rating' => $data['rating'], 'commentaire' => $data['commentaire'] ?? null]
            );

            return response()->json(['success' => true, 'evaluation' => $evaluation]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Impossible de noter l\'agent', 'message' => $e->getMessage()], 500);
        }
    }
}
