<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthFacilities extends Model
{
    use HasFactory;

    protected $table = 'health_facilities';
    protected $fillable = ['name', 'cities_id', 'province_id', 'address', 'phone', 'type', 'vaccination_id', 'quota'];

    public function cities()
    {
        return $this->belongsTo('App\Models\Cities');
    }

    public function vaccination()
    {
        return $this->belongsTo('App\Models\Vaccinations');
    }
}
