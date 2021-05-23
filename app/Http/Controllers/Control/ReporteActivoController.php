<?php

namespace App\Http\Controllers\Control;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use App\Librerias\Libreria;
use App\Models\Control\Area;
use App\Models\Control\Compra;
use App\Models\Control\Proveedor;

class ReporteActivoController extends Controller
{
    protected $folderview      = 'reportes';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $entidad          = 'compra';
        $tipos            = [''=>'Todos'] + ['PRODUCTOS'=>'PRODUCTOS', 'ACTIVOS'=>'ACTIVOS'];
        $proveedor =["" => 'Todos'] + Proveedor::pluck('razonsocial', 'id')->all();
        $area = ["" => 'Todos'] + Area::pluck('descripcion', 'id')->all();
        $estado= ["" => 'Todos'] + ['REGISTRADO' =>'REGISTRADO', 'RECEPCIONADO' => 'RECEPCIONADO', 'OBSERVADO'=>'CON OBSERVACION', 'FINALIZADO'=>'FINALIZADO'];
        return view($this->folderview . '.adminActivo')->with(compact('entidad' , 'tipos', 'proveedor', 'estado', 'area'));
    }

    public function pdfActivo(Request $request)
    {   
        $fecinicio        = Libreria::getParam($request->input('fechainicio'));
        $fecfin           = Libreria::getParam($request->input('fechafin'));
        $tipo             = Libreria::getParam($request->input('tipo'));
        $area             = Libreria::getParam($request->input('area'));
        $estado             = Libreria::getParam($request->input('estado'));
        $cliente      = Libreria::getParam($request->input('cliente'));

        $resultado        = Compra::with('detallecompra')
        ->where(function ($subquery) use ($fecinicio) {
            if (!is_null($fecinicio) && strlen($fecinicio) > 0) {
                $subquery->where('compra.fechasolicitud', '>=', date_format(date_create($fecinicio), 'Y-m-d H:i:s'));
            }
        })
        ->where(function ($subquery) use ($cliente) {
            if (!is_null($cliente) && strlen($cliente) > 0) {
                $subquery->where('compra.proveedor_id', '=' ,$cliente);
            }
        })
        ->where(function ($subquery) use ($estado) {
            if (!is_null($estado) && strlen($estado) > 0) {
                $subquery->where('estado', $estado);
            }
        })
        ->where(function ($subquery) use ($area) {
            if (!is_null($area) && strlen($area) > 0) {
                $subquery->where('area_id', $area);
            }
        })
        ->where(function ($subquery) use ($fecfin) {
            if (!is_null($fecfin) && strlen($fecfin) > 0) {
                $subquery->where('compra.fechasolicitud', '<=', date_format(date_create($fecfin), 'Y-m-d H:i:s'));
            }
        })
        ->where('tipo', 'ACTIVOS')
        ->orderBy('created_at','ASC');


        $lista1            = $resultado->get();
        $pdf = PDF::loadView('reportes.pdfActivo', compact('lista1', 'tipo', 'fecinicio', 'fecfin'))->setPaper('a4','landscape');
        return $pdf->stream('inventario.pdf');
    }
}
