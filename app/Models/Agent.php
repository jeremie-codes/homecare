<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'service_id', 'category_id', 'type', 'experience', 'disponibilite', 'adresse', 'statut', 'rating',
        'is_badges', 'recommended_at', 'recommended_by'
    ];

    protected $casts = [
        'recommended_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recommendedBy()
    {
        return $this->belongsTo(User::class, 'recommended_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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

