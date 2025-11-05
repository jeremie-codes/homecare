<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function agents()
    {
        return $this->belongsToMany(Agent::class);
    }
}
