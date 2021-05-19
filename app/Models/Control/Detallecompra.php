<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detallecompra extends Model
{
    use SoftDeletes;
    protected $table = 'detallecompra';
    protected $dates = ['deleted_at'];

    public function recibos(){
        return $this->hasMany(Reciboinventario::class, 'detallecompra_id');
    }

    public function envio(){
        return $this->belongsTo(Envio::class, 'envio_id');
    }
    public function compra(){
        return $this->belongsTo(Compra::class, 'compra_id');
    }
    public function activo(){
        return $this->belongsTo(Activo::class, 'activo_id');
    }
    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
