<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'agent_id', 'description',
        'date_debut', 'date_fin', 'statut', 'montant'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function services()
    {
        return $this->hasMany(MissionService::class);
    }

    public function taches()
    {
        return $this->hasMany(MissionTache::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function rapports()
    {
        return $this->hasMany(Rapport::class);
    }
}
