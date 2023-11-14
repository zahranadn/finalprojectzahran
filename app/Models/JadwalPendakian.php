<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalPendakian extends Model
{
    use SoftDeletes;
    public $table ="jadwal_pendakian"; 

    protected $fillable = [
        'destinasi_detail_id','tanggal_pendakian', 'kuota_pendakian', 'terdaftar', 'biaya'
    ];

    protected $hidden = [

    ];

    public function destinasi_detail(){
        return $this->belongsTo( DestinasiDetail::class, 'destinasi_detail_id' );
    }

    public function transactions(){
        return $this->hasMany( Transaction::class, 'destinasi_detail_id', 'jadwal_pendakian_id', 'id' );
    }
}
