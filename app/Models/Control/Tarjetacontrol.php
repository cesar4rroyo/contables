<?php

namespace App\Models\Control;

use App\Models\Admin\Personal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarjetacontrol extends Model
{
    use SoftDeletes;
    protected $table = 'tarjetacontrol';
    protected $dates = ['deleted_at'];

    public function empleado(){
        return $this->belongsTo(Personal::class, 'empleado_id');
    }
    public function carpetaempleado(){
        return $this->belongsTo(Carpetaempleado::class, 'carpetaempleado_id');
    }
}
