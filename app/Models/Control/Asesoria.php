<?php

namespace App\Models\Control;

use App\Models\Admin\Personal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asesoria extends Model
{
    use SoftDeletes;
    protected $table = 'asesoria';
    protected $dates = ['deleted_at'];
    public function ventas(){
        return $this->hasMany(Venta::class, 'asesoria_id');
        
    }
    public function cliente(){
        return $this->belongsTo(Personal::class, 'cliente_id');
    }
    public function empleado(){
        return $this->belongsTo(Personal::class, 'empleado_id');
    }
    public function detalleasesoria()
    {
        return $this->hasMany(Detalleasesoria::class, 'asesoria_id');
    }
}
