<?php

namespace App\Http\Controllers\Control;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Http\Adapter\Guzzle6\Client;
use Illuminate\Support\Facades\DB;
use App\Librerias\Libreria;
use App\Models\Control\Proveedor;
use Validator;


class ProveedorController extends Controller
{
    protected $folderview      = 'control.proveedor';
    protected $tituloAdmin     = 'Proveedor';
    protected $tituloRegistrar = 'Registrar Proveedor';
    protected $tituloModificar = 'Modificar Proveedor';
    protected $tituloEliminar  = 'Eliminar Proveedor';
    protected $rutas           = array(
        'create' => 'proveedor.create',
        'edit'   => 'proveedor.edit',
        'delete' => 'proveedor.eliminar',
        'search' => 'proveedor.buscar',
        'index'  => 'proveedor.index',
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
        $entidad          = 'proveedor';
        $nombres          = Libreria::getParam($request->input('razonsocial'));
        $dni              = Libreria::getParam($request->input('ruc'));
        $resultado        = Proveedor::listar($nombres, $dni); 
        $lista            = $resultado->get();
        $cabecera         = array();
        $cabecera[]       = array('valor' => '#', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Razon Social', 'numero' => '1');
        $cabecera[]       = array('valor' => 'RUC', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Direccion', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Telefono', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Correo', 'numero' => '1');
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
            return view($this->folderview . '.list')->with(compact('lista', 'paginacion', 'inicio', 'fin', 'entidad', 'cabecera', 'titulo_modificar', 'titulo_eliminar', 'ruta'));
        }
        return view($this->folderview . '.list')->with(compact('lista', 'entidad'));
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entidad          = 'proveedor';
        $title            = $this->tituloAdmin;
        $titulo_registrar = $this->tituloRegistrar;
        $ruta             = $this->rutas;
        return view($this->folderview . '.admin')->with(compact('entidad', 'title', 'titulo_registrar', 'ruta'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $listar   = Libreria::getParam($request->input('listar'), 'NO');
        $entidad  = 'proveedor';
        $proveedor = null;
        $formData = array('proveedor.store');
        $formData = array('route' => $formData, 'class' => 'form-horizontal', 'id' => 'formMantenimiento' . $entidad, 'autocomplete' => 'off');
        $boton    = 'Registrar';
        return view($this->folderview . '.mant')->with(compact('proveedor', 'formData', 'entidad', 'boton', 'listar'));
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
        $reglas     = array(
            'ruc' => 'required',
            'razonsocial2' => 'required',
            'direccion' => 'required',
        );
        $mensajes = array(
            'ruc.required'         => 'Debe ingresar el número de RUC',
            'razonsocial2.required'         => 'Debe ingresar la Razon Social',
            'direccion.required'         => 'Debe ingresar una dirección',
            
        );
        $validacion = Validator::make($request->all(), $reglas, $mensajes);
        if ($validacion->fails()) {
            return $validacion->messages()->toJson();
        }
        $error = DB::transaction(function () use ($request) {
            $proveedor = Proveedor::create([
                       
                'ruc' => strtoupper($request->input('ruc')),           
                'razonsocial' => strtoupper($request->input('razonsocial2')),           
                'direccion' => strtoupper($request->input('direccion')),
                'email' => $request->input('email'),       
                'telefono' => strtoupper($request->input('telefono')),
                'tipo'=>$request->tipo,
                  
            ]);
            
        });
        return is_null($error) ? "OK" : $error;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $existe = Libreria::verificarExistencia($id, 'proveedor');
        if ($existe !== true) {
            return $existe;
        }
        $listar   = Libreria::getParam($request->input('listar'), 'NO');
        $proveedor = Proveedor::find($id);
        $entidad  = 'proveedor';
        $formData = array('proveedor.update', $id);
        $formData = array('route' => $formData, 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'formMantenimiento' . $entidad, 'autocomplete' => 'off');
        $boton    = 'Modificar';
        return view($this->folderview . '.mant')->with(compact('proveedor', 'formData', 'entidad', 'boton', 'listar'));
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
        $existe = Libreria::verificarExistencia($id, 'proveedor');
        if ($existe !== true) {
            return $existe;
        }
        if($request->quetipoes=='Proveedor'){
            $reglas     = array(
                'nombres' => 'required|max:50',
                'apellidopaterno' => 'required|max:50',
                'apellidomaterno' => 'required|max:50',
                'rol_id' => 'required',
                'area_id'=>'required',
                'cargo_id'=>'required',
            );
            $mensajes = array(
                'nombre.required'         => 'Debe ingresar un nombre',
                'apellidopaterno.required'         => 'Debe ingresar el apellido paterno',
                'apellidomaterno.required'         => 'Debe ingresar el apellido materno',
                'rol_id.required'         => 'Debe seleccionar al menos un Rol',
                'dni.unique'=>'La proveedor con el DNI ingresado ya se encuentra registrado',
                'dni.required'=>'El campo DNI es obligatorio',
                'dni.min'=>'El DNI es incorrecto',
                'dni.max'=>'El DNI es incorrecto',
                'cargo_id.required'=>'El campo Cargo es obligatorio',
                'area_id.required'=>'El campo Área es obligatorio',
            );
        }else{
            $reglas     = array(
                'ruc' => 'required',
                'razonsocial' => 'required',
                'direccion' => 'required',
            );
            $mensajes = array(
                'ruc.required'         => 'Debe ingresar el número de RUC',
                'razonsocial.required'         => 'Debe ingresar la Razon Social',
                'direccion.required'         => 'Debe ingresar una dirección',
                
            );
        }
        $validacion = Validator::make($request->all(), $reglas, $mensajes);
        if ($validacion->fails()) {
            return $validacion->messages()->toJson();
        }
        $error = DB::transaction(function () use ($request, $id) {
            $proveedor = Proveedor::find($id);
            $proveedor->update([
                'apellidopaterno' => strtoupper($request->input('apellidopaterno')),
                'apellidomaterno' => strtoupper($request->input('apellidomaterno')),
                'nombres' => strtoupper($request->input('nombres')),
                'dni' => strtoupper($request->input('dni')),           
                'ruc' => strtoupper($request->input('ruc')),           
                'razonsocial' => strtoupper($request->input('ruc')),           
                'direccion' => strtoupper($request->input('direccion')),
                'email' => $request->input('email'),       
                'telefono' => strtoupper($request->input('telefono')),
                'cargo_id' => $request->input('cargo_id'),       
                'area_id' => $request->input('area_id'), 
            ]);
            $proveedor->roles()->sync($request->rol_id);
            
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
        $existe = Libreria::verificarExistencia($id, 'proveedor');
        if ($existe !== true) {
            return $existe;
        }
        $error = DB::transaction(function () use ($id) {
            $proveedor = Proveedor::find($id);
            $proveedor->delete();
        });
        return is_null($error) ? "OK" : $error;
    }

    public function eliminar($id, $listarLuego)
    {
        $existe = Libreria::verificarExistencia($id, 'proveedor');
        if ($existe !== true) {
            return $existe;
        }
        $listar = "NO";
        if (!is_null(Libreria::obtenerParametro($listarLuego))) {
            $listar = $listarLuego;
        }
        $modelo   = Proveedor::find($id);
        $entidad  = 'proveedor';
        $formData = array('route' => array('proveedor.destroy', $id), 'method' => 'DELETE', 'class' => 'form-horizontal', 'id' => 'formMantenimiento'.$entidad, 'autocomplete' => 'off');
        $boton    = 'Eliminar';
        return view('reusable.confirmarEliminar')->with(compact('modelo', 'formData', 'entidad', 'boton', 'listar'));
    }

    public function buscarRUC(Request $request){
        $respuesta = array();
        $ruc = $request->input('ruc');
        $client = new \GuzzleHttp\Client();
        $res = $client->get('http://157.245.85.164/facturacion/buscaCliente/BuscaClienteRuc.php?fe=N&token=qusEj_w7aHEpX&' . 'ruc=' . $ruc);
        if ($res->getStatusCode() == 200) { // 200 OK
            $response_data = $res->getBody()->getContents();
            $respuesta = json_decode($response_data);
        }
        return json_encode($respuesta);
    }

    public function getInfo(Request $request){
        $value=$request->id;
        $salario=Carpetaempleado::where('empleado_id', $value)->first()->salario;
        $data=Tarjetacontrol::where('empleado_id', $value)->get()->toArray();
        $horas=0;
        foreach ($data as $value) {
            $horas+=$value['horastrabajadas'];
        }
        $data=[
            'salario'=>$salario,
            'horas'=>$horas
        ];
        return $data;
    }

}
