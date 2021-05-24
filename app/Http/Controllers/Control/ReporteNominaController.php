<?php

namespace App\Http\Controllers\Control;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use App\Librerias\Libreria;
use App\Models\Admin\Cargo;
use App\Models\Admin\Personal;
use App\Models\Control\Area;
use App\Models\Control\Nomina;
use Illuminate\Support\Facades\DB;

class ReporteNominaController extends Controller
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
        $entidad          = 'nomina';
        $tipos            = [''=>'Todos'] + ['PRODUCTOS'=>'PRODUCTOS', 'ACTIVOS'=>'ACTIVOS'];
        $empleado = [''=>'Todos'] + Personal::select(DB::raw('CONCAT(apellidopaterno, " ", apellidomaterno, " ", nombres) AS full_name2'), 'id')->whereNotNull('cargo_id')->pluck('full_name2', 'id')->all();
        $area = ["" => 'Todos'] + Area::pluck('descripcion', 'id')->all();
        $cargo = ["" => 'Todos'] + Cargo::pluck('descripcion', 'id')->all();
        $estado= ["" => 'Todos'] + ['REGISTRADO' =>'REGISTRADO', 'AUTORIZAR' => 'AUTORIZADO', 'CHEQUE PREPARADO'=>'CHEQUE PREPARADO', 'PAGO DISTRIBUIDO'=>'PAGO DISTRIBUIDO'];
        return view($this->folderview . '.adminNomina')->with(compact('entidad' , 'tipos', 'estado', 'area', 'cargo', 'empleado'));
    }

    public function pdfNomina(Request $request)
    {   
        $fecinicio        = Libreria::getParam($request->input('fechainicio'));
        $fecfin           = Libreria::getParam($request->input('fechafin'));
        $cargo             = Libreria::getParam($request->input('cargo'));
        $area             = Libreria::getParam($request->input('area'));
        $estado             = Libreria::getParam($request->input('estado'));
        $empleado      = Libreria::getParam($request->input('empleado'));

        $resultado        = Nomina::with('empleado')
        ->where(function ($subquery) use ($fecinicio) {
            if (!is_null($fecinicio) && strlen($fecinicio) > 0) {
                $subquery->where('fecha', '>=', date_format(date_create($fecinicio), 'Y-m-d H:i:s'));
            }
        })
        ->where(function ($subquery) use ($empleado) {
            if (!is_null($empleado) && strlen($empleado) > 0) {
                $subquery->where('empleado_id', '=' ,$empleado);
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
        ->where(function ($subquery) use ($cargo) {
            if (!is_null($cargo) && strlen($cargo) > 0) {
                $subquery->where('cargo_id', $cargo);
            }
        })
        ->where(function ($subquery) use ($fecfin) {
            if (!is_null($fecfin) && strlen($fecfin) > 0) {
                $subquery->where('fecha', '<=', date_format(date_create($fecfin), 'Y-m-d H:i:s'));
            }
        })
        ->orderBy('fecha','ASC');


        $lista1            = $resultado->get();
        $pdf = PDF::loadView('reportes.pdfNomina', compact('lista1', 'fecinicio', 'fecfin'))->setPaper('a4','landscape');
        return $pdf->stream('inventario.pdf');
    }
}
