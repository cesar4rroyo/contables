<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activo extends Model
{
    use SoftDeletes;
    protected $table = 'activo';
    protected $dates = ['deleted_at'];

    public function detallecomprobante(){
        return $this->hasMany(Detallecomprobante::class, 'activo_id');
    }
    public function detallecompra(){
        return $this->hasMany(Detallecompra::class, 'activo_id');

    }
    public function inventario(){
        return $this->hasMany(Inventario::class, 'activo_id');
        
    }
    public function activoarea(){
        return $this->belongsToMany(Area::class, 'activoarea', 'activo_id');
    }
}
