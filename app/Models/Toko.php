<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
    protected $table = 'lokasi_toko';
    protected $primaryKey = 'barcode';

    protected $fillable = [ 
                            
                            'nama_toko',
                            'latitude',
                            'longitude',
                            'accuracy',
                            'created_at',
                            'updated_at'
                        ];

}
