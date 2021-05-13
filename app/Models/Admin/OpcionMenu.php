<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OpcionMenu extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'opcionmenu';
    protected $primaryKey = 'id';
    protected $fillable = ['descripcion', 'icono', 'orden', 'link', 'grupomenu_id'];

    public function grupomenu()
    {
        return $this->belongsTo(GrupoMenu::class, 'grupomenu_id');
    }
    public function tipousuario()
    {
        return $this->belongsToMany(TipoUsuario::class, 'acceso', 'opcionmenu_id', 'tipousuario_id');
    }
    public static function getMenu()
    {
        $opcionmenu = new OpcionMenu();
        $opcion_tipousuario = $opcionmenu->getOpcionMenus();
        return $opcion_tipousuario;
    }
    //obtener las opciones de menu que le corresponden al tipodeusuario que esta logueado
    public function getOpcionMenus()
    {
        $grupoWithOpciones = GrupoMenu::with([
            'opcionmenu' => function ($query) {
                $query->whereHas('tipousuario', function ($q) {
                    $q->where('tipousuario_id', session()->get('tipousuario_id'))->orderBy('orden');
                });
            }
        ])->orderBy('orden')->get()->toArray();
        return $grupoWithOpciones;
    }
    public function getGrupoMenus()
    {
        $grupo = GrupoMenu::orderBy('orden')->get()->toArray();
        return $grupo;
    }

    public function scopelistar($query, $name, $grupomenu_id)
    {
        return $query->where(function ($subquery) use ($name) {
            if (!is_null($name)) {
                $subquery->where('descripcion', 'LIKE', '%' . $name . '%');
            }
        })
            ->where(function ($subquery) use ($grupomenu_id) {
                if (!is_null($grupomenu_id)) {
                    $subquery->where('grupomenu_id', '=', $grupomenu_id);
                }
            })
            ->orderBy('grupomenu_id', 'ASC')
            ->orderBy('orden', 'ASC');
    }
}
