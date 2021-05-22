<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    protected $table = 'producto';
    protected $dates = ['deleted_at'];

    public function inventario(){
        return $this->hasMany(Inventario::class, 'producto_id');
    }
    public function detallecompra(){
        return $this->hasMany(Detallecompra::class, 'producto_id');
    }
    public function detalleventa(){
        return $this->hasMany(Detalleventa::class, 'producto_id');
    }
    public function detalledevolucion(){
        return $this->hasMany(detalledevolucion::class, 'producto_id');
    }
    public function descuento(){
        return $this->hasMany(Descuento::class, 'producto_id');
    }
    public function detallecomprobante(){
        return $this->hasMany(Detallecomprobante::class, 'producto_id');
    }
    public function asesoria()
    {
        return $this->belongsToMany(Asesoria::class, 'detalleasesoria');
    }
}
