<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'ec_districts';
    protected $primaryKey = 'dis_id';

    protected function kelurahan(){
        return $this->hasMany(Kelurahan::class);
    }
    protected function kota(){
        return $this->belongsTo(Kota::class);
    }
    // use HasFactory;
}
