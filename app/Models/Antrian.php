<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;
    protected $table = 'antrian';
    protected $primaryKey = 'antrian_id';
    protected $fillable = [
        'antrian_id',
        'nomor_antrian',
        'loket'
    ];
    public $timestamps = false;
}
