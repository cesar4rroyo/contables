<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reciboinventario extends Model
{
    use SoftDeletes;
    protected $table = 'reciboinventario';
    protected $dates = ['deleted_at'];

    public function envio(){
        return $this->belongsTo(Envio::class, 'envio_id');
    }
    public function compra(){
        return $this->belongsTo(Compra::class, 'compra_id');
    }
    public function detallecompra(){
        return $this->belongsTo(Detallecompra::class, 'detallecompra_id');
    }

}
