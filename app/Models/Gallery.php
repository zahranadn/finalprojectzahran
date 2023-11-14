<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;
    public $table ="galleries"; 

    protected $fillable = [
        'destinasi_detail_id', 'image'
    ];

    protected $hidden = [

    ];

    public function destinasi_detail(){
        return $this->belongsTo( DestinasiDetail::class, 'destinasi_detail_id', 'id' );
    }

}
