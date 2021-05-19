<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use SoftDeletes;
    protected $table = 'pago';
    protected $dates = ['deleted_at'];
    public function pagocliente(){
        return $this->hasMany(Pagocliente::class, 'pago_id');
    }
    public function comprobante(){
        return $this->belongsTo(Comprobante::class, 'comprobante_id');
    }
    public function venta(){
        return $this->belongsTo(Venta::class, 'venta_id');
    }

}
