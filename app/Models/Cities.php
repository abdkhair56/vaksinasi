<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provinces;

class Cities extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $fillable = ['name','province_id'];

    public function healthFacilities(){
        return $this->hasMany('App\Models\HealthFacilities');
    }

    public function province(){
        return $this->belongsTo('App\Models\Provinces');
    }
}
