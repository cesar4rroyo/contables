<?php

namespace App\Models\Control;

use App\Models\Admin\Personal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comprobante extends Model
{
    use SoftDeletes;
    protected $table = 'comprobante';
    protected $dates = ['deleted_at'];
    public function cheques(){
        return $this->hasMany(Cheque::class, 'comprobante_id');
    }
    public function detallecomprobante(){
        return $this->hasMany(Detallecomprobante::class, 'comprobante_id');
    }
    public function pagos(){
        return $this->hasMany(Pago::class, 'comprobante_id');
    }
    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
    public function venta(){
        return $this->belongsTo(Venta::class, 'venta_id');
    }
    public function cliente(){
        return $this->belongsTo(Personal::class, 'cliente_id');
    }
    public function compra(){
        return $this->belongsTo(Compra::class, 'compra_id');
    }
   

}
