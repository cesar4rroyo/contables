<?php

namespace App\Http\Controllers\Control;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Librerias\Libreria;
use App\Models\Control\Compra;
use App\Models\Control\Detallecompra;
use App\Models\Control\Producto;
use App\Models\Control\Proveedor;
use App\Models\Control\Seguimiento;
use Http\Adapter\Guzzle6\Client;
use Validator;


class ComprasController extends Controller
{
    protected $folderview      = 'control.compras';
    protected $tituloAdmin     = 'Compra';
    protected $tituloRegistrar = 'Registrar Compra';
    protected $tituloModificar = 'Modificar Compra';
    protected $tituloEliminar  = 'Eliminar Compra';
    protected $rutas           = array(
        'create' => 'compra.create',
        'edit'   => 'compra.edit',
        'delete' => 'compra.eliminar',
        'search' => 'compra.buscar',
        'index'  => 'compra.index',
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
        $entidad          = 'compra';
        $nombres          = Libreria::getParam($request->input('nombres'));
        $dni              = Libreria::getParam($request->input('dni'));
        $area_id          = Libreria::getParam($request->input('area'));
        $rol              = Libreria::getParam($request->input('rol'));
        $cargo_id         = Libreria::getParam($request->input('cargo'));
        $resultado        = Compra::where('tipo', 'PRODUCTOS')->orderBy('id'); 
        $lista            = $resultado->get();
        $cabecera         = array();
        $cabecera[]       = array('valor' => '#', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Número', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Fecha Solicitud', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Fecha Esperada de Entrega', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Fecha de Entrega', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Estado', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Proveedor', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Total', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Operaciones', 'numero' => '3');

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
        $entidad          = 'compra';
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
        $entidad  = 'compra';
        $compra = null;
        $tipo = null;
        $formData = array('compra.store');
        $cboProveedor = [''=>'Seleccione una opcion'] + Proveedor::where('tipo', 'PRODUCTOS')->pluck('razonsocial', 'id')->all();
        $formData = array('route' => $formData, 'class' => 'form-horizontal', 'id' => 'formMantenimiento' . $entidad, 'autocomplete' => 'off');
        $boton    = 'Registrar';
        $productos = ["" => "Seleccione un producto"];
        $productos += Producto::pluck('descripcion', 'id')->all();
        return view($this->folderview . '.mant')->with(compact('compra', 'formData', 'entidad', 'boton', 'listar', 'cboProveedor', 'productos', 'tipo'));
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
            'fechasolicitud' => 'required',
            'fechaesperada' => 'required',
            'numero' => 'required',
            'proveedor' => 'required',
        );
        $mensajes = array(
            'fechasolicitud.required'         => 'Debe ingresar la fecha de solicitud',
            'fechaesperada.required'         => 'Debe ingresar la fecha posible de llegada',
            'numero.required'         => 'Debe ingresar el numero de compra',
            'proveedor.required'         => 'Debe seleccionar al proveedor',
        );
        
        $validacion = Validator::make($request->all(), $reglas, $mensajes);
        if ($validacion->fails()) {
            return $validacion->messages()->toJson();
        }
        $usuario = session()->get('personal');
        $error = DB::transaction(function () use ($request, $usuario) {
            $array_areas = \json_decode($request->input('listarProductos') , true);
            $total=0;
            for ($i=0; $i < count($array_areas) ; $i++) { 
                $temp_plazo = $request->input("precio".$array_areas[$i]["idarea"]);
                if($temp_plazo != "" && $temp_plazo){
                    $total  = $total + $temp_plazo;
                }
            }
            $compra = new Compra();
            $compra->fechasolicitud = $request->fechasolicitud;
            $compra->fechaesperada = $request->fechaesperada;
            $compra->proveedor_id = $request->proveedor;
            $compra->tipo='PRODUCTOS';
            $compra->estado='REGISTRADO';
            $compra->numero=$request->numero;
            $compra->total=$total;
            $compra->save();

            for ($i=0; $i < count($array_areas) ; $i++) { 
                $detalle                    = new Detallecompra();
                $detalle->producto_id    = $array_areas[$i]["idarea"];
                $detalle->cantidad = $request->input("plazo".$array_areas[$i]["idarea"]);
                $detalle->preciocompra = $request->input("precio".$array_areas[$i]["idarea"]);
                $detalle->compra_id = $compra->id;
                $detalle->save();
            }

            $seguimiento = new Seguimiento();
            $seguimiento->fecha=date("Y-m-d H:i:s");
            $seguimiento->accion='REGISTRO FORMULARIO PEDIDO DE COMPRA';
            $seguimiento->orden=1;
            $seguimiento->compra_id=$compra->id;
            //$seguimiento->usuario_id= $usuario['id'];
            //$seguimiento->area_id= $usuario['id'];
            $seguimiento->save();
                        

            
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
        $existe = Libreria::verificarExistencia($id, 'compra');
        if ($existe !== true) {
            return $existe;
        }
        $tipo = $request->tipo ? $request->tipo : null;
        $productos = ["" => "Seleccione un producto"];
        $productos += Producto::pluck('descripcion', 'id')->all();
        $listar   = Libreria::getParam($request->input('listar'), 'NO');
        $compra = Compra::find($id);
        $entidad  = 'compra';
        $cboProveedor = [''=>'Seleccione una opcion'] + Proveedor::where('tipo', 'PRODUCTOS')->pluck('razonsocial', 'id')->all();
        $formData = array('compra.update', $id);
        $formData = array('route' => $formData, 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'formMantenimiento' . $entidad, 'autocomplete' => 'off');
        $boton    = 'Modificar';
        return view($this->folderview . '.mant')->with(compact('compra', 'formData', 'entidad', 'boton', 'listar', 'productos', 'cboProveedor', 'tipo'));
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
        $existe = Libreria::verificarExistencia($id, 'compra');
        if ($existe !== true) {
            return $existe;
        }
   
            $reglas     = array(
                'fechasolicitud' => 'required',
                'fechaesperada' => 'required',
            );
            $mensajes = array(
                'fechasolicitud.required'         => 'Debe ingresar la fecha de solicitud',
                'fechaesperada.required'         => 'Debe ingresar la fecha posible de llegada',
            );
        
        $validacion = Validator::make($request->all(), $reglas, $mensajes);
        if ($validacion->fails()) {
            return $validacion->messages()->toJson();
        }

        if($request->tipo=='recepcionar'){
            $error = DB::transaction(function () use ($request, $id){
                $compra = Compra::find($id);
                if($request->estadoenvio=='CONFORME'){
                    $compra->estado='RECEPCIONADO';
                }
                $compra->fechaentrega=$request->fechaentrega;
                $compra->save();
            });
            return is_null($error) ? "OK" : $error;
        }
        if($request->tipo=='pagar'){
            $error = DB::transaction(function () use ($request, $id){
                $compra = Compra::find($id);
                if($request->estadoenvio=='CONFORME'){
                    $compra->estado='FINALIZADO';
                }
                $compra->factura=$request->factura;
                $compra->fechaentrega=$request->fechaentrega;
                $compra->save();
            });
            return is_null($error) ? "OK" : $error;
        }


        $error = DB::transaction(function () use ($request, $id) {
            $compra = Personal::find($id);
            $compra->update([
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
            $compra->roles()->sync($request->rol_id);
            
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
        $existe = Libreria::verificarExistencia($id, 'compra');
        if ($existe !== true) {
            return $existe;
        }
        $error = DB::transaction(function () use ($id) {
            $compra = Compra::find($id);
            $compra->delete();
        });
        return is_null($error) ? "OK" : $error;
    }

    public function eliminar($id, $listarLuego)
    {
        $existe = Libreria::verificarExistencia($id, 'compra');
        if ($existe !== true) {
            return $existe;
        }
        $listar = "NO";
        if (!is_null(Libreria::obtenerParametro($listarLuego))) {
            $listar = $listarLuego;
        }
        $modelo   = Compra::find($id);
        $entidad  = 'compra';
        $formData = array('route' => array('compra.destroy', $id), 'method' => 'DELETE', 'class' => 'form-horizontal', 'id' => 'formMantenimiento'.$entidad, 'autocomplete' => 'off');
        $boton    = 'Eliminar';
        return view('reusable.confirmarEliminar')->with(compact('modelo', 'formData', 'entidad', 'boton', 'listar'));
    }
}
