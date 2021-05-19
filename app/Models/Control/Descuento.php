<?php

namespace App\Models\Control;

use App\Models\Admin\Personal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Descuento extends Model
{
    use SoftDeletes;
    protected $table = 'descuento';
    protected $dates = ['deleted_at'];
    public function detalleventa(){
        return $this->hasMany(Detalleventa::class, 'descuento_id');
    }
    public function detallecomprobante(){
        return $this->hasMany(Detallecomprobante::class, 'descuento_id');
    }
    public function cliente(){
        return $this->belongsTo(Personal::class, 'cliente_id');
    }
    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }
    
}
