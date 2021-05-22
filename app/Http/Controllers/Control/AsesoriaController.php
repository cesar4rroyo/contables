<?php

namespace App\Http\Controllers\Control;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Librerias\Libreria;
use App\Models\Admin\Personal;
use App\Models\Control\Asesoria;
use App\Models\Control\Detalleasesoria;
use App\Models\Control\Producto;
use Http\Adapter\Guzzle6\Client;
use Validator;

class AsesoriaController extends Controller
{
    protected $folderview      = 'control.asesoria';
    protected $tituloAdmin     = 'Asesoria';
    protected $tituloRegistrar = 'Registrar Asesoria';
    protected $tituloModificar = 'Modificar Asesoria';
    protected $tituloEliminar  = 'Eliminar Asesoria';
    protected $rutas           = array('create' => 'asesoria.create', 
            'edit'   => 'asesoria.edit', 
            'delete' => 'asesoria.eliminar',
            'search' => 'asesoria.buscar',
            'index'  => 'anio.index',
        );


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Mostrar el resultado de búsquedas
     * 
     * @return Response 
     */
    public function buscar(Request $request)
    {
        $pagina           = $request->input('page');
        $filas            = $request->input('filas');
        $entidad          = 'asesoria';
        $nombre           = Libreria::getParam($request->input('descripcion'));
        // $resultado        = Asesoria::where('descripcion', 'LIKE', '%'.strtoupper($nombre).'%')->orderBy('descripcion', 'ASC');
        $resultado        = Asesoria::orderBy('fecha', 'DESC');
        $lista            = $resultado->get();
        $cabecera         = array();
        $cabecera[]       = array('valor' => '#', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Fecha', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Cliente', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Asesor', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Operaciones', 'numero' => '2');
        
        $titulo_modificar = $this->tituloModificar;
        $titulo_eliminar  = $this->tituloEliminar;
        $ruta             = $this->rutas;
        if (count($lista) > 0) {
            $clsLibreria     = new Libreria();
            $paramPaginacion = $clsLibreria->generarPaginacion($lista, $pagina, $filas, $entidad);
            $paginacion      = $paramPaginacion['cadenapaginacion'];
            $inicio          = $paramPaginacion['inicio'];
            $fin             = $paramPaginacion['fin'];
            $paginaactual    = $paramPaginacion['nuevapagina'];
            $lista           = $resultado->paginate($filas);
            $request->replace(array('page' => $paginaactual));
            return view($this->folderview.'.list')->with(compact('lista', 'paginacion', 'inicio', 'fin', 'entidad', 'cabecera', 'titulo_modificar', 'titulo_eliminar', 'ruta'));
        }
        return view($this->folderview.'.list')->with(compact('lista', 'entidad'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entidad          = 'asesoria';
        $title            = $this->tituloAdmin;
        $titulo_registrar = $this->tituloRegistrar;
        $ruta             = $this->rutas;
        return view($this->folderview.'.admin')->with(compact('entidad', 'title', 'titulo_registrar', 'ruta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $listar   = Libreria::getParam($request->input('listar'), 'NO');
        $entidad  = 'asesoria';
        $asesoria = null;
        $productos = ["" => "Seleccione un producto"];
        $productos += Producto::pluck('descripcion', 'id')->all();
        $cboClientes = [''=>'Seleccione una opcion'] + Personal::whereNotNull('razonsocial')->pluck('razonsocial', 'id')->all();
        $formData = array('asesoria.store');
        $formData = array('route' => $formData, 'class' => 'form-horizontal', 'id' => 'formMantenimiento'.$entidad, 'autocomplete' => 'off');
        $boton    = 'Registrar'; 
        return view($this->folderview.'.mant')->with(compact('asesoria', 'formData', 'entidad', 'boton', 'listar', 'cboClientes', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listar     = Libreria::getParam($request->input('listar'), 'NO');
        $reglas     = array('fecha' => 'required');
        $mensajes = array(
            'fecha.required'         => 'Debe ingresar una fecha'
            );
            
        $validacion = Validator::make($request->all(), $reglas, $mensajes);
        if ($validacion->fails()) {
            return $validacion->messages()->toJson();
        }
        $error = DB::transaction(function() use($request){
            $array_areas = \json_decode($request->input('listarProductos') , true);
            $asesoria = new Asesoria();
            $asesoria->fecha= $request->input('fecha');
            $asesoria->cliente_id= $request->cliente;
            $asesoria->empleado_id= 2;
            //$asesoria->limite= $request->input('limite');
            $asesoria->save();
            for ($i=0; $i < count($array_areas) ; $i++) { 
                $detalle                    = new Detalleasesoria();
                $detalle->producto_id    = $array_areas[$i]["idarea"];
                $detalle->asesoria_id = $asesoria->id;
                $detalle->save();
            }
        });

        return is_null($error) ? "OK" : $error;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $existe = Libreria::verificarExistencia($id, 'asesoria');
        if ($existe !== true) {
            return $existe;
        }
        $cboClientes = [''=>'Seleccione una opcion'] + Personal::whereNotNull('razonsocial')->pluck('razonsocial', 'id')->all();
        $productos = ["" => "Seleccione un producto"];
        $productos += Producto::pluck('descripcion', 'id')->all();
        $listar   = Libreria::getParam($request->input('listar'), 'NO');
        $asesoria = Asesoria::find($id);
        $entidad  = 'asesoria';
        $formData = array('asesoria.update', $id);
        $formData = array('route' => $formData, 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'formMantenimiento'.$entidad, 'autocomplete' => 'off');
        $boton    = 'Modificar';
        return view($this->folderview.'.mant')->with(compact('asesoria', 'formData', 'entidad', 'boton', 'listar', 'cboClientes', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existe = Libreria::verificarExistencia($id, 'asesoria');

        if ($existe !== true) {
            return $existe;
        }
        $reglas     = array('descripcion' => 'required');
        $mensajes = array(
            'descripcion.required'         => 'Debe ingresar una descripcion'
            );
        $validacion = Validator::make($request->all(), $reglas, $mensajes);
        if ($validacion->fails()) {
            return $validacion->messages()->toJson();
        } 
        $error = DB::transaction(function() use($request, $id){
            $asesoria = Asesoria::find($id);
            $asesoria->descripcion = strtoupper($request->input('descripcion'));
            $asesoria->mesadepartes= $request->input('mesadepartes')?true:false;
            $asesoria->save();
        });
        return is_null($error) ? "OK" : $error;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existe = Libreria::verificarExistencia($id, 'asesoria');
        if ($existe !== true) {
            return $existe;
        }
        $error = DB::transaction(function() use($id){
            $asesoria = Asesoria::find($id);
            $asesoria->delete();
        });
        return is_null($error) ? "OK" : $error;
    }

    public function eliminar($id, $listarLuego)
    {
        $existe = Libreria::verificarExistencia($id, 'asesoria');
        if ($existe !== true) {
            return $existe;
        }
        $listar = "NO";
        if (!is_null(Libreria::obtenerParametro($listarLuego))) {
            $listar = $listarLuego;
        }
        $modelo   = Asesoria::find($id);
        $entidad  = 'asesoria';
        $formData = array('route' => array('asesoria.destroy', $id), 'method' => 'DELETE', 'class' => 'form-horizontal', 'id' => 'formMantenimiento'.$entidad, 'autocomplete' => 'off');
        $boton    = 'Eliminar';
        return view('reusable.confirmarEliminar')->with(compact('modelo', 'formData', 'entidad', 'boton', 'listar'));
    }
    public function listarAsesoria(Request $request){
        $q = $request->input('search');
        $tipo = $request->input('tipo');
        if($tipo!='no'){
            $resultados = Asesoria::where(function($query) use($q, $tipo){
                $query->where('fecha','LIKE', '%'.$q.'%')
                    ->where('id', 'LIKE', '%'.$tipo.'%');
            })->get();
            $data = array();
            foreach ($resultados as $r) {
                $data["results"][] = [ "text" => $r->fecha,"id" => $r->id];
            }
            return  \json_encode($data);
        }
    }
}
