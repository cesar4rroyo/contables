<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class GrupoMenu extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'grupomenu';
    protected $primaryKey = 'id';
    protected $fillable = ['descripcion', 'icono', 'orden'];
    
    public function opcionmenu()
    {
        return $this->hasMany(OpcionMenu::class, 'grupomenu_id');
    }
}
