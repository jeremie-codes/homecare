<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Declare the Tache model class pour la gestion des taches de chaque service et supplement pour le demande supplementaire du client
class Tache extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'nom', 'description'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
