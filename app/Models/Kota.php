<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'ec_cities';
    protected $primaryKey = 'city_id';

    protected function kecamatan(){
        return $this->hasMany(Kecamatan::class);
    }
    protected function provinsi(){
        return $this->belongsTo(Provinsi::class);
    }
    // use HasFactory;
}
