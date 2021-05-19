<?php

namespace App\Models\Control;

use App\Models\Admin\Personal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use SoftDeletes;
    protected $table = 'venta';
    protected $dates = ['deleted_at'];

    public function devolucion(){
        return $this->hasMany(Devolucion::class, 'venta_id');
    }
    public function seguimiento(){
        return $this->hasMany(Seguimiento::class, 'venta_id');
    }
    public function detalleventa(){
        return $this->hasMany(Detalleventa::class, 'venta_id');
    }
    public function envio(){
        return $this->hasMany(Envio::class, 'venta_id');
    }
    public function pago(){
        return $this->hasMany(Pago::class, 'venta_id');
    }
    public function asesoria(){
        return $this->belongsTo(Asesoria::class, 'asesoria_id');
    }
    public function cliente(){
        return $this->belongsTo(Personal::class, 'cliente_id');
    }

}
