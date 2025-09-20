<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionService extends Model
{
    use HasFactory;

    protected $fillable = ['mission_id', 'service_id', 'prix'];

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
