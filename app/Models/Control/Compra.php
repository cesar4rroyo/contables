<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    use SoftDeletes;
    protected $table = 'compra';
    protected $dates = ['deleted_at'];
    public function recibos(){
        return $this->hasMany(Reciboinventario::class, 'compra_id');
    }
    public function cheques(){
        return $this->hasMany(Cheque::class, 'compra_id');
    }
    public function envios(){
        return $this->hasMany(Envio::class, 'compra_id');
    }
    public function detallecompra(){
        return $this->hasMany(Detallecompra::class, 'compra_id');
    }
    public function comprobante(){
        return $this->hasMany(Comprobante::class, 'compra_id');
    }
    public function seguimiento(){
        return $this->hasMany(Seguimiento::class, 'compra_id');
    }
    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}
