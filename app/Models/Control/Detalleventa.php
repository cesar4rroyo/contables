<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detalleventa extends Model
{
    use SoftDeletes;
    protected $table = 'detalleventa';
    protected $dates = ['deleted_at'];

    public function envio(){
        return $this->belongsTo(Envio::class, 'envio_id');
    }
    public function venta(){
        return $this->belongsTo(Venta::class, 'venta_id');
    }
    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }
    public function descuentos(){
        return $this->belongsTo(Descuento::class, 'descuento_id');
    }

}
