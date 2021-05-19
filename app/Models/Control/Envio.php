<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Envio extends Model
{
    use SoftDeletes;
    protected $table = 'envio';
    protected $dates = ['deleted_at'];

    public function detallecompra(){
        return $this->hasMany(Detallecompra::class, 'envio_id');
    }
    public function recibos(){
        return $this->hasMany(Reciboinventario::class, 'envio_id');
    }
    public function detalleventa(){
        return $this->hasMany(Detalleventa::class, 'envio_id');
    }
    public function venta(){
        return $this->belongsTo(Venta::class, 'venta_id');
    }
    public function compra(){
        return $this->belongsTo(Compra::class, 'compra_id');
    }
}
