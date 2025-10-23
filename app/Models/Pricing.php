<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'price',
        'periode',
        'start_date',
        'end_date',
        'is_active',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
