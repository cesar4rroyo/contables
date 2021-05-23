<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes;
    protected $table = 'proveedor';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'direccion',
        'telefono',
        'email',
        'ruc',
        'razonsocial',
        'tipo'
    ];
    public function comprobante(){
        return $this->hasMany(Comprobante::class, 'proveedor_id');
    }
    public function compra(){
        return $this->hasMany(Compra::class, 'proveedor_id');
    }

    public function scopelistar($query, $nombre, $dni)
    {
        return $query->where(function ($subquery) use ($nombre) {
            if (!is_null($nombre)) {
                    $subquery->where('razonsocial', 'LIKE', '%' . $nombre . '%');
                }
            })
            ->where(function ($subquery) use ($dni) {
                if (!is_null($dni)) {
                    $subquery->where('ruc', '=', $dni);
                }
            })
            ->orderBy('id', 'ASC');        
    }

}
