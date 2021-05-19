<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Impuesto extends Model
{
    use SoftDeletes;
    protected $table = 'impuesto';
    protected $dates = ['deleted_at'];
    public function nomina(){
        return $this->hasMany(Nomina::class, 'impuesto_id');
    }
}
