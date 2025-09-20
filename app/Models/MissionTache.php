<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionTache extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission_id', 'tache_id', 'description',
        'est_extra', 'prix_supplementaire'
    ];

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }

    public function tache()
    {
        return $this->belongsTo(Tache::class);
    }
}
