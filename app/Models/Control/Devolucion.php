<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Devolucion extends Model
{
    use SoftDeletes;
    protected $table = 'devolucion';
    protected $dates = ['deleted_at'];

    public function detalledevolucion(){
        return $this->hasMany(Detalledevolucion::class, 'devolucion_id');
    }   
    public function seguimiento(){
        return $this->hasMany(Seguimiento::class, 'devolucion_id');
    }
    public function venta(){
        return $this->belongsTo(Venta::class, 'venta_id');
    }

}
