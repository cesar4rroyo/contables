<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagocliente extends Model
{
    use SoftDeletes;
    protected $table = 'pagocliente';
    protected $dates = ['deleted_at'];

    public function comprobante(){
        return $this->belongsTo(Comprobante::class, 'comprobante_id');
    }
    public function venta(){
        return $this->belongsTo(Venta::class, 'venta_id');
    }
}
