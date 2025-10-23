<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'type', 'prix_base', 'is_actif', 'image',  ];

    public function taches()
    {
        return $this->hasMany(Tache::class);
    }
}
