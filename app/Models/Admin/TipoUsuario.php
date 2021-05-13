<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'tipousuario';
    protected $primaryKey = 'id';
    protected $fillable = ['descripcion'];

    public function usuario()
    {
        return $this->hasMany(Usuario::class, 'tipousuario_id');
    }
    public function opcionmenu()
    {
        return $this->belongsToMany(OpcionMenu::class, 'acceso', 'tipousuario_id', 'opcionmenu_id');
    }
}
