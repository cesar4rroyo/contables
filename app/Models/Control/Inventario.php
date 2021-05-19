<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventario extends Model
{
    use SoftDeletes;
    protected $table = 'inventario';
    protected $dates = ['deleted_at'];

    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }
    public function activo(){
        return $this->belongsTo(Activo::class, 'activo_id');
    }
}
