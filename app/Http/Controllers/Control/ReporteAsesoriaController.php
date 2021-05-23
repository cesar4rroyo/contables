<?php

namespace App\Http\Controllers\Control;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Personal;
use Barryvdh\DomPDF\Facade as PDF;
use App\Librerias\Libreria;
use App\Models\Control\Asesoria;

class ReporteAsesoriaController extends Controller
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
        $entidad          = 'Asesoria';
        $tipos            = [''=>'Todos'] + ['PRODUCTOS'=>'PRODUCTOS', 'ACTIVOS'=>'ACTIVOS'];
        $clientes =['TODOS', ''] + Personal::whereNotNull('razonsocial')->pluck('razonsocial', 'id')->all();
        return view($this->folderview . '.adminAsesoria')->with(compact('entidad' , 'tipos', 'clientes'));
    }

    public function pdfAsesoria(Request $request)
    {   
        
        
        $fecinicio        = Libreria::getParam($request->input('fechainicio'));
        $fecfin           = Libreria::getParam($request->input('fechafin'));
        $tipo             = Libreria::getParam($request->input('tipo'));
        $cliente      = Libreria::getParam($request->input('cliente'));

        $resultado        = Asesoria::with('detalleasesoria')
        ->where(function ($subquery) use ($fecinicio) {
            if (!is_null($fecinicio) && strlen($fecinicio) > 0) {
                $subquery->where('asesoria.fecha', '>=', date_format(date_create($fecinicio), 'Y-m-d H:i:s'));
            }
        })
        ->where(function ($subquery) use ($cliente) {
            if (!is_null($cliente) && strlen($cliente) > 0 && $cliente!=0) {
                $subquery->where('asesoria.cliente_id', '=' ,$cliente);
            }
        })
        ->where(function ($subquery) use ($fecfin) {
            if (!is_null($fecfin) && strlen($fecfin) > 0) {
                $subquery->where('asesoria.fecha', '<=', date_format(date_create($fecfin), 'Y-m-d H:i:s'));
            }
        })
        ->orderBy('created_at','ASC');


        $lista1            = $resultado->get();
        $pdf = PDF::loadView('reportes.pdfAsesoria', compact('lista1', 'tipo', 'fecinicio', 'fecfin'))->setPaper('a4','landscape');
        return $pdf->stream('inventario.pdf');
    }
}
