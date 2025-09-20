<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'type_agent', 'prix_base', 'actif'];

    public function taches()
    {
        return $this->hasMany(Tache::class);
    }

    public function missionsServices()
    {
        return $this->hasMany(MissionService::class);
    }
}
