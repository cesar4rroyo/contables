<?php

namespace App\Http\Controllers\Control;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use App\Librerias\Libreria;
use App\Models\Admin\Personal;
use App\Models\Control\Venta;
use Illuminate\Support\Facades\DB;


class ReporteVentaController extends Controller
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
        $entidad          = 'venta';
        $tipos            = [''=>'Todos'] + ['PRODUCTOS'=>'PRODUCTOS', 'ACTIVOS'=>'ACTIVOS'];
        $clientes =['' => 'Todos'] + Personal::whereNotNull('razonsocial')->pluck('razonsocial', 'id')->all();
        $estado= ["" => 'Todos'] + ['REGISTRADO' =>'REGISTRADO', 'ENVIADO' => 'ENVIADO', 'FINALIZADO'=>'FINALIZADO'];
        return view($this->folderview . '.adminVenta')->with(compact('entidad' , 'tipos', 'estado','clientes'));
    }

    public function pdfVenta(Request $request)
    {   
        $fecinicio        = Libreria::getParam($request->input('fechainicio'));
        $fecfin           = Libreria::getParam($request->input('fechafin'));
        $estado             = Libreria::getParam($request->input('estado'));
        $cliente      = Libreria::getParam($request->input('cliente'));

        $resultado        = Venta::with('cliente')
        ->where(function ($subquery) use ($fecinicio) {
            if (!is_null($fecinicio) && strlen($fecinicio) > 0) {
                $subquery->where('fecharegistro', '>=', date_format(date_create($fecinicio), 'Y-m-d H:i:s'));
            }
        })
        ->where(function ($subquery) use ($cliente) {
            if (!is_null($cliente) && strlen($cliente) > 0) {
                $subquery->where('cliente_id', '=' ,$cliente);
            }
        })
        ->where(function ($subquery) use ($estado) {
            if (!is_null($estado) && strlen($estado) > 0) {
                $subquery->where('estado', $estado);
            }
        })
        ->where(function ($subquery) use ($fecfin) {
            if (!is_null($fecfin) && strlen($fecfin) > 0) {
                $subquery->where('fecharegistro', '<=', date_format(date_create($fecfin), 'Y-m-d H:i:s'));
            }
        })
        ->orderBy('created_at','ASC');


        $lista1            = $resultado->get();
        $pdf = PDF::loadView('reportes.pdfVenta', compact('lista1', 'fecinicio', 'fecfin'))->setPaper('a4','landscape');
        return $pdf->stream('venta.pdf');
    }
}
