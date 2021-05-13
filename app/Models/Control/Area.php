<?php

namespace App\Models\Control;

use App\Models\Admin\Personal;
use App\Models\Gestion\Seguimiento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
	use SoftDeletes;
    protected $table = 'area';
    protected $dates = ['deleted_at'];

    public function personal()
    {
        return $this->hasMany(Personal::class, 'area_id');
    }
    public function seguimientos()
    {
        return $this->hasMany(Seguimiento::class, 'area_id');
    }
}
