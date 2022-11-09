<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cities;

class Provinces extends Model
{
    use HasFactory;

    protected $table = 'provinces';
    protected $fillable = ['name'];

    public function cities(){
        return $this->hasMany('App\Models\Cities');
    }

}
