<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'ec_subdistricts';
    protected $primaryKey = 'subdis_id';
    protected function customer(){
        return $this->hasMany(Customer::class);
    }
    protected function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
    // use HasFactory;
}
