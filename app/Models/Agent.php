<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'service_id', 'type', 'experience', 'disponibilite', 'adresse', 'statut', 'is_recommended', 'rating',
        'is_badges', 'recommended_at', 'recommended_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
    
}

