<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'type', 'experience', 'disponibilite',
        'tarif_horaire', 'adresse', 'statut'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function missions()
    {
        return $this->hasMany(Mission::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}

