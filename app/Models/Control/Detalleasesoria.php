<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detalleasesoria extends Model
{
    use SoftDeletes;
    protected $table = 'detalleasesoria';
    protected $dates = ['deleted_at'];
    public function asesoria(){
        return $this->belongsTo(Asesoria::class, 'asesoria_id');
    }
    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
