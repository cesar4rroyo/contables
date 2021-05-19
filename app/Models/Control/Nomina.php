<?php

namespace App\Models\Control;

use App\Models\Admin\Personal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nomina extends Model
{
    use SoftDeletes;
    protected $table = 'nomina';
    protected $dates = ['deleted_at'];
    public function cheques(){
        return $this->hasMany(Cheque::class, 'nomina_id');
    }
    public function seguimiento(){
        return $this->hasMany(Seguimiento::class, 'nomina_id');
    }
    public function empleado(){
        return $this->belongsTo(Personal::class, 'empleado_id');
    }
    public function impuesto(){
        return $this->belongsTo(Impuesto::class, 'impuesto_id');
    }
    public function carpteempleado(){
        return $this->belongsTo(Carpetaempleado::class, 'carpetaempleado_id');
    }
  
}
