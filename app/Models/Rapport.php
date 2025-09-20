<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission_id', 'auteur_id', 'cible_id',
        'type', 'message', 'statut'
    ];

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }

    public function auteur()
    {
        return $this->belongsTo(User::class, 'auteur_id');
    }

    public function cible()
    {
        return $this->belongsTo(User::class, 'cible_id');
    }
}
