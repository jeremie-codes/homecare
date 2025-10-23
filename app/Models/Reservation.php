<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

 protected $fillable = [
        'client_id',
        'service_id',
        'agent_id',
        'date_reservation',
        'duree',
        'frequence',
        'adresse',
        'phone',
        'nombre_personnes',
        'taches_specifiques',
        'taille_logement',
        'equipements_fournis',
        'conditions_particulieres',
        'transport_inclus',
        'urgence',
        'statut',
    ];

    /**
     * Relations
     */

    // Une réservation appartient à un client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Une réservation concerne un service (babysitting, ménage, etc.)
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Une réservation peut être attribuée à un agent (nounou, ménager)
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }


}
