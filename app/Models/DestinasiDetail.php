<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DestinasiDetail extends Model
{
    use SoftDeletes;
    public $table ="destinasi_detail"; 

    protected $fillable = [
        'namagunung','slug','location','tentang_gunung'
    ];

    protected $hidden = [

    ];

    public function galleries(){
        return $this->hasMany( Gallery::class, 'destinasi_detail_id', 'id' );
    }

    public function jadwalpendakian(){
        return $this->hasMany( JadwalPendakian::class, 'destinasi_detail_id', 'id' );
    }

    public function transactions(){
        return $this->hasMany( Transaction::class, 'destinasi_detail_id', 'jadwal_pendakian_id', 'id' );
    }
}
