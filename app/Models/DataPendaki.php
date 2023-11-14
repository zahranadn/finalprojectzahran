<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPendaki extends Model
{
    use SoftDeletes;
    public $table ="data_pendaki"; 

    protected $fillable = [
        'transactions_id', 'nama', 'tanggallahir', 'jeniskelamin', 'asaldaerah', 'alamat', 'nohandphone', 'noidentitas', 'foto_identitas', 'keterangan_pendaki'
    ];

    protected $hidden = [

    ];
    public function transaction(){
        return $this->belongsTo( Transaction::class, 'transactions_id', 'id' );
    }
}
