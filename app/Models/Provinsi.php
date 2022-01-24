<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'ec_provinces';
    protected $primaryKey = 'prov_id';
    // use HasFactory;
    protected function kota(){
        return $this->hasMany(Kota::class);
    }
}
