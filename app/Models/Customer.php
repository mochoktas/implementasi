<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    public $incrementing = false;
    // protected $keyType = 'string';

    protected $fillable = [
                            'nama',
                            'alamat',
                            'foto',
                            'file_path',
                            'subdis_id'
                        ];
    public $timestamps = false; 
    
    // use HasFactory;
    protected function kelurahan(){
        return $this->belongsTo(Kelurahan::class,'subdis_id','subdis_id');
        // return $this->belongsTo(Kelurahan::class);
    }
}
