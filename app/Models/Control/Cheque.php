<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cheque extends Model
{
    use SoftDeletes;
    protected $table = 'cheque';
    protected $dates = ['deleted_at'];
    public function compra(){
        return $this->belongsTo(Compra::class, 'compra_id');
    }
    public function nomina(){
        return $this->belongsTo(Nomina::class, 'nomina_id');
    }
    public function comprobante(){
        return $this->belongsTo(Comprobante::class, 'comprobante_id');
    }
}
