<?php

namespace App\Http\Controllers\Reportes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Librerias\Libreria;
use App\Models\Control\Activo;
use App\Models\Control\Area;
use App\Models\Control\Inventario;
use App\Models\Control\Producto;

class ReporteInventarioController extends Controller
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
        $entidad          = 'inventario';
        $tipos            = [''=>'Todos'] + ['PRODUCTOS'=>'PRODUCTOS', 'ACTIVOS'=>'ACTIVOS'];
        return view($this->folderview . '.admininventario')->with(compact('entidad' , 'tipos'));
    }

    public function pdfInventario(Request $request)
    {   
        
        
        $tipo             = Libreria::getParam($request->input('tipo'));

        if($tipo=='PRODUCTOS'){
            $resultado        = Producto::with('inventario')
            ->whereHas('inventario', function ($subquery) use ($tipo) {
                if (!is_null($tipo) && strlen($tipo) > 0) {
                    $subquery->where('tipo', '=' ,$tipo);
                }
            })
            ->orderBy('id','ASC');
            $lista1            = $resultado->get();
            $pdf = PDF::loadView('reportes.pdfInventario', compact('lista1', 'tipo'))->setPaper('a4','landscape');
        return $pdf->stream('inventario.pdf');

        }else if($tipo=='ACTIVOS'){
            $resultado        = Activo::with('inventario')
            ->whereHas('inventario', function ($subquery) use ($tipo) {
                if (!is_null($tipo) && strlen($tipo) > 0) {
                    $subquery->where('tipo', '=' ,$tipo);
                }
            })
            ->orderBy('id','ASC');
            $lista1            = $resultado->get();

                            $pdf = PDF::loadView('reportes.pdfInventarioActivos', compact('lista1', 'tipo'))->setPaper('a4','landscape');
        return $pdf->stream('inventario.pdf');

        }else{
            $resultado        = Activo::with('inventario')
            ->whereHas('inventario', function ($subquery) use ($tipo) {
                if (!is_null($tipo) && strlen($tipo) > 0) {
                    $subquery->where('tipo', '=' ,$tipo);
                }
            })
            ->orderBy('id','ASC');  
        }

        $lista1            = $resultado->get();
        $pdf = PDF::loadView('reportes.pdfInventario', compact('lista1', 'tipo'))->setPaper('a4','landscape');
        return $pdf->stream('inventario.pdf');
    }
}
