<?php

namespace App\Models\Control;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Compra extends Model
{
    use SoftDeletes;
    protected $table = 'compra';
    protected $dates = ['deleted_at'];
    public function recibos(){
        return $this->hasMany(Reciboinventario::class, 'compra_id');
    }
    public function cheques(){
        return $this->hasMany(Cheque::class, 'compra_id');
    }
    public function envios(){
        return $this->hasMany(Envio::class, 'compra_id');
    }
    public function detallecompra(){
        return $this->hasMany(Detallecompra::class, 'compra_id');
    }
    public function comprobante(){
        return $this->hasMany(Comprobante::class, 'compra_id');
    }
    public function seguimiento(){
        return $this->hasMany(Seguimiento::class, 'compra_id');
    }
    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
    public function area(){
        return $this->belongsTo(Area::class, 'area_id');
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
					$subquery->where('fechasolicitud', '>=', date_format(date_create($fecinicio), 'Y-m-d H:i:s'));
				}
			})
			->where(function ($subquery) use ($fecfin) {
				if (!is_null($fecfin) && strlen($fecfin) > 0) {
					$subquery->where('fechasolicitud', '<=', date_format(date_create($fecfin), 'Y-m-d H:i:s'));
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
	public function scopeNumeroSigue2($query , $año)
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
