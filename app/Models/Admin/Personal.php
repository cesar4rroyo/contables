<?php

namespace App\Models\Admin;

use App\Models\Control\Area;
use App\Models\Gestion\Seguimiento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Personal extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'personal';
    protected $fillable = [
        'dni',
        'apellidopaterno',
        'apellidomaterno',
        'nombres',
        'dni',
        'direccion',
        'telefono',
        'email',
        'area_id',
        'cargo_id',
        'ruc',
        'razonsocial'
    ];
    //funciones para el mantenimiento
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'rolpersonal');
    }

    public function usuario()
    {
        return $this->hasMany(Usuario::class);
    }
    public function seguimiento()
    {
        return $this->hasMany(Seguimiento::class);
    }

    public static function getUsuarios(){
        $id_rolUsuario = '1';
         $personas = Personal::whereHas('roles', function ($query) use ($id_rolUsuario) {
             $query->where('rol.id', '=', $id_rolUsuario);
         })->get();
         return $personas;
    }

    public function getFullNameAttribute(){
        return $this->apellidopaterno . ' ' . $this->apellidomaterno . ' ' . $this->nombres;
    }

    public function scopelistar($query, $nombre, $dni, $area_id, $cargo_id)
    {
        return $query->where(function ($subquery) use ($nombre) {
            if (!is_null($nombre)) {
                    $subquery->where(DB::raw('concat(personal.apellidopaterno,\' \',personal.apellidomaterno,\' \',personal.nombres)'), 'LIKE', '%' . $nombre . '%');
                }
            })
            ->where(function ($subquery) use ($dni) {
                if (!is_null($dni)) {
                    $subquery->where('dni', '=', $dni);
                }
            })
            ->where(function ($subquery) use ($area_id) {
                if (!is_null($area_id)) {
                    $subquery->where('area_id', '=', $area_id);
                }
            })
            ->where(function ($subquery) use ($cargo_id) {
                if (!is_null($cargo_id)) {
                    $subquery->where('cargo_id', '=', $cargo_id);
                }
            })
            ->orderBy('id', 'ASC');        
    }
}
