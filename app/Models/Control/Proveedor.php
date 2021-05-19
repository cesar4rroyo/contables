<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes;
    protected $table = 'proveedor';
    protected $dates = ['deleted_at'];

    public function comprobante(){
        return $this->hasMany(Comprobante::class, 'proveedor_id');
    }
    public function compra(){
        return $this->hasMany(Compra::class, 'proveedor_id');
    }

}
