<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    public $table ="transactions"; 

    protected $fillable = [
        'destinasi_detail_id','jadwal_pendakian_id', 'users_id', 'transaction_total', 'status_pendakian', 'transaction_status'
    ];

    protected $hidden = [

    ];

    public function pendaki(){
        return $this->hasMany( DataPendaki::class, 'transactions_id', 'id' );
    }

    public function destinasi_detail(){
        return $this->belongsTo( DestinasiDetail::class, 'destinasi_detail_id', 'id');
    }

    public function jadwal_pendakian(){
        return $this->belongsTo( JadwalPendakian::class, 'jadwal_pendakian_id','id');
    }
    
    public function user(){
        return $this->belongsTo( User::class, 'users_id', 'id' );
    }

}
