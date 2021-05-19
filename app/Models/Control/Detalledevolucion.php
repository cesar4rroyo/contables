<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detalledevolucion extends Model
{
    use SoftDeletes;
    protected $table = 'detalledevolucion';
    protected $dates = ['deleted_at'];

    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function detalledevolucion(){
        return $this->belongsTo(Detalledevolucion::class, 'detalledevolucion_id');
    }
}
