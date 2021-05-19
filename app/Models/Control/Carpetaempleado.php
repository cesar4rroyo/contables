<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carpetaempleado extends Model
{
    use SoftDeletes;
    protected $table = 'carpetaempleado';
    protected $dates = ['deleted_at'];
    public function empleado(){
        return $this->belongsTo(Personal::class, 'empleado_id');
    }
    public function tarjetas(){
        return $this->hasMany(Tarjetacontrol::class, 'carpetaempleado_id');
    }
    public function nominas(){
        return $this->hasMany(Nomina::class, 'carpetaempleado_id');
    }
}
