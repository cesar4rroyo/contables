<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detallecomprobante extends Model
{
    use SoftDeletes;
    protected $table = 'detallecomprobante';
    protected $dates = ['deleted_at'];

    public function activo(){
        return $this->belongsTo(Activo::class, 'activo_id');
    }
    public function descuento(){
        return $this->belongsTo(Descuento::class, 'descuento_id');
    }
    public function comprobante(){
        return $this->belongsTo(Comprobante::class, 'comprobante_id');
    }
    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }



}
