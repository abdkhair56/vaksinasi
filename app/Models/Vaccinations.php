<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccinations extends Model
{
    use HasFactory;

    protected $table = 'vaccinations';
    protected $fillable = ['name'];

    public function healthFacilities(){
        return $this->hasMany('App\Models\HealthFacilities');
    }
}
