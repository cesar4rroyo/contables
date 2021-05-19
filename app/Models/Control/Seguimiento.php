<?php

namespace App\Models\Control;

use App\Models\Admin\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seguimiento extends Model
{
    use SoftDeletes;
    protected $table = 'seguimiento';
    protected $dates = ['deleted_at'];

    public function compra(){
        return $this->belongsTo(Compra::class, 'compra_id');
    }
    public function nomina(){
        return $this->belongsTo(Nomina::class, 'nomina_id');
    }
    public function devolucion(){
        return $this->belongsTo(Devolucion::class, 'devolucion_id');
    }
    public function venta(){
        return $this->belongsTo(Venta::class, 'venta_id');
    }
    public function usuario(){
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
    public function area(){
        return $this->belongsTo(Area::class, 'area_id');
    }
}
