<?php

namespace App\Models\Control;

use App\Models\Admin\Personal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Venta extends Model
{
    use SoftDeletes;
    protected $table = 'venta';
    protected $dates = ['deleted_at'];

    public function devolucion(){
        return $this->hasMany(Devolucion::class, 'venta_id');
    }
    public function seguimiento(){
        return $this->hasMany(Seguimiento::class, 'venta_id');
    }
    public function detalleventa(){
        return $this->hasMany(Detalleventa::class, 'venta_id');
    }
    public function envio(){
        return $this->hasMany(Envio::class, 'venta_id');
    }
    public function pago(){
        return $this->hasMany(Pago::class, 'venta_id');
    }
    public function asesoria(){
        return $this->belongsTo(Asesoria::class, 'asesoria_id');
    }
    public function cliente(){
        return $this->belongsTo(Personal::class, 'cliente_id');
    }
    public function comprobante(){
        return $this->hasOne(Comprobante::class, 'venta_id');
    }
    public function scopelistar($query, $numero, $fecinicio, $fecfin)
	{
		return $query
            ->where(function ($subquery) use ($numero) {
				if (!is_null($numero) && strlen($numero) > 0) {
					$subquery->where('numero', 'LIKE', '%'.$numero.'%');
				}
			})
			->where(function ($subquery) use ($fecinicio) {
				if (!is_null($fecinicio) && strlen($fecinicio) > 0) {
					$subquery->where('fecharegistro', '>=', date_format(date_create($fecinicio), 'Y-m-d H:i:s'));
				}
			})
			->where(function ($subquery) use ($fecfin) {
				if (!is_null($fecfin) && strlen($fecfin) > 0) {
					$subquery->where('fecharegistro', '<=', date_format(date_create($fecfin), 'Y-m-d H:i:s'));
				}
			})
			->orderBy('created_at', 'DESC');
	}

	public function scopeNumeroSigue($query , $año)
	{
			$rs = $query
				->where(function ($subquery) use ($año) {
					if (!is_null($año) && strlen($año) > 0) {
						$subquery->where('numero', 'LIKE', '%'.$año.'-%');
					}
				})->select(DB::raw("max((CASE WHEN numero IS NULL THEN 0 ELSE convert(substr(numero,6,11),SIGNED  integer) END)*1) AS maximo"))->first();
		
        return str_pad($rs->maximo + 1, 11, '0', STR_PAD_LEFT);
    }

}
