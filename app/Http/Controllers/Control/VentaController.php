<?php

namespace App\Http\Controllers\Control;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Librerias\Libreria;
use App\Models\Admin\Personal;
use App\Models\Control\Asesoria;
use App\Models\Control\Comprobante;
use App\Models\Control\Descuento;
use App\Models\Control\Detallecomprobante;
use App\Models\Control\Detalleventa;
use App\Models\Control\Envio;
use App\Models\Control\Inventario;
use App\Models\Control\Pago;
use App\Models\Control\Producto;
use App\Models\Control\Seguimiento;
use App\Models\Control\Venta;
use Carbon\Carbon;
use Validator;
use Http\Adapter\Guzzle6\Client;
use Barryvdh\DomPDF\Facade as PDF;

class VentaController extends Controller
{
    protected $folderview      = 'control.ventas';
    protected $tituloAdmin     = 'Venta';
    protected $tituloRegistrar = 'Registrar Venta';
    protected $tituloModificar = 'Modificar Venta';
    protected $tituloEliminar  = 'Eliminar Venta';
    protected $rutas           = array(
        'create' => 'venta.create',
        'edit'   => 'venta.edit',
        'delete' => 'venta.eliminar',
        'search' => 'venta.buscar',
        'index'  => 'venta.index',
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
        $entidad          = 'venta';
        $nombres          = Libreria::getParam($request->input('numero_search'));
        $fecinicio        = Libreria::getParam($request->input('fechainicio'));
        $fecfin           = Libreria::getParam($request->input('fechafin'));
        $resultado        = Venta::listar($nombres, $fecinicio, $fecfin); 
        $lista            = $resultado->get();
        $cabecera         = array();
        $cabecera[]       = array('valor' => '#', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Número', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Fecha Pedido', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Fecha Envio', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Estado', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Cliente', 'numero' => '1');
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
        $entidad          = 'venta';
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
        $entidad  = 'venta';
        $venta = null;
        $tipo = null;
        $formData = array('venta.store');
        $cbocliente = ['Seleccione un cliente', ''] + Personal::whereNotNull('razonsocial')->pluck('razonsocial', 'id')->all();
        $formData = array('route' => $formData, 'class' => 'form-horizontal', 'id' => 'formMantenimiento' . $entidad, 'autocomplete' => 'off');
        $boton    = 'Registrar';
        $productos = ["" => "Seleccione un producto"];
        $productos += Producto::wherehas('inventario', function($q){
            $q->where('cantidad', '!=' ,0);
        })->pluck('descripcion', 'id')->all();
        $cboAsesoria = ['Seleccione una opcion', ''] + Asesoria::pluck('fecha', 'id')->all();
      //  $asesoria = Asesoria
        return view($this->folderview . '.mant')->with(compact('venta', 'formData', 'entidad', 'boton', 'listar', 'cbocliente', 'productos', 'tipo', 'cboAsesoria'));
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
            'fecharegistro' => 'required',
            'numero' => 'required',
            'cliente' => 'required',
        );
        $mensajes = array(
            'fecharegistro.required'         => 'Debe ingresar la fecha de solicitud',
            'numero.required'         => 'Debe ingresar el numero de venta',
            'cliente.required'         => 'Debe seleccionar al cliente',
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
                $cantidad = $request->input("plazo".$array_areas[$i]["idarea"]);
                if($temp_plazo != "" && $temp_plazo){
                    $total  = $total + $temp_plazo*$cantidad;
                }
            }
            $venta = new Venta();
            $venta->fecharegistro = $request->fecharegistro;
            $venta->numero = $request->numero;
            $venta->cliente_id = $request->cliente;
            $venta->asesoria_id=$request->asesoria;
            $venta->estado='REGISTRADO';
            $venta->total=$total;
            $venta->save();

            for ($i=0; $i < count($array_areas) ; $i++) { 
                $detalle                    = new Detalleventa();
                if($request->input("descuento".$array_areas[$i]["idarea"])>0){
                    $descuento = new Descuento();
                    $descuento->cliente_id=$request->cliente;
                    $descuento->producto_id= $array_areas[$i]["idarea"];
                    $descuento->porcentaje=$request->input("descuento".$array_areas[$i]["idarea"]);
                    $descuento->venta_id=$venta->id;
                    $descuento->motivo=$request->motivo;
                    $descuento->save();
                    $detalle->descuento_id=($descuento) ? $descuento->id : null;
                }
                $detalle->producto_id    = $array_areas[$i]["idarea"];
                $detalle->cantidad = $request->input("plazo".$array_areas[$i]["idarea"]);
                $detalle->precioventa = $request->input("subtotal".$array_areas[$i]["idarea"]);
                $detalle->descuento = $request->input("descuento".$array_areas[$i]["idarea"]);
                $detalle->venta_id = $venta->id;
                $detalle->save();
            }

            $seguimiento = new Seguimiento();
            $seguimiento->fecha=date("Y-m-d H:i:s");
            $seguimiento->accion='REGISTRO FORMULARIO DE VENTA';
            $seguimiento->orden=1;
            $seguimiento->venta_id=$venta->id;
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
        $existe = Libreria::verificarExistencia($id, 'venta');
        if ($existe !== true) {
            return $existe;
        }
        $tipo = $request->tipo ? $request->tipo : null;
        $productos = ["" => "Seleccione un producto"];
        $productos += Producto::pluck('descripcion', 'id')->all();
        $listar   = Libreria::getParam($request->input('listar'), 'NO');
        $venta = Venta::find($id);
        $entidad  = 'venta';
        $cbocliente = ['Seleccione un cliente', ''] + Personal::whereNotNull('razonsocial')->pluck('razonsocial', 'id')->all();
        $productos = ["" => "Seleccione un producto"];
        $productos += Producto::wherehas('inventario', function($q){
            $q->where('cantidad', '!=' ,0);
        })->pluck('descripcion', 'id')->all();
        $cboAsesoria = ['Seleccione una opcion', ''] + Asesoria::pluck('fecha', 'id')->all();
        $formData = array('venta.update', $id);
        $formData = array('route' => $formData, 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'formMantenimiento' . $entidad, 'autocomplete' => 'off');
        $boton    = 'Aceptar';
        return view($this->folderview . '.mant')->with(compact('venta', 'formData', 'entidad', 'boton', 'listar', 'productos', 'cbocliente', 'tipo', 'productos', 'cboAsesoria'));
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
        $existe = Libreria::verificarExistencia($id, 'venta');
        if ($existe !== true) {
            return $existe;
        }
   
            $reglas     = array(
                'fechaenvio' => 'required',
            );
            $mensajes = array(
                'fechaenvio.required'         => 'Debe ingresar la fecha de solicitud',
            );
        
        $validacion = Validator::make($request->all(), $reglas, $mensajes);
        if ($validacion->fails()) {
            return $validacion->messages()->toJson();
        }

        if($request->tipo=='enviar'){
            $error = DB::transaction(function () use ($request, $id){
                $venta = Venta::find($id);
                if($request->estadoenvio=='CONFORME'){
                    $venta->estado='ENVIADO';
                    $venta->fechaenvio=$request->fechaenvio;
                    $detalles = Detalleventa::where('venta_id', $venta->id)->get();
                    foreach ($detalles as $detalle) {
                        $inventario = Inventario::where('producto_id',$detalle->producto_id)->first();
                        $inventario->cantidad = $inventario->cantidad-$detalle->cantidad;
                        $inventario->save();
                    }
                    $envio = new Envio();
                    $envio->fecha=Carbon::now();
                    $envio->orden=1;
                    $envio->venta_id=$id;
                    $envio->save();
                    $comprobante = new Comprobante();
                    $comprobante->numero=$request->comprobante;
                    $comprobante->fecha = Carbon::now();
                    $comprobante->tipodocumento='FACTURA';
                    $comprobante->venta_id=$venta->id;
                    $comprobante->cliente_id=$venta->cliente_id;
                    $comprobante->total=$venta->total;
                    $comprobante->save();
                    foreach ($detalles as $detalle) {
                        $dcomp = new Detallecomprobante();
                        $dcomp->preciocompra=$detalle->producto->preciounitario;
                        $dcomp->precioventa=$detalle->precioventa;
                        $dcomp->producto_id=$detalle->producto_id;
                        $dcomp->cantidad=$detalle->cantidad;
                        $dcomp->descuento_id=($detalle->descuento_id) ? $detalle->descuento_id : null;
                        $dcomp->comprobante_id=$comprobante->id;
                        $dcomp->save();
                    }
                }else{
                    $venta->estado = 'CON OBSERVACION';
                    $envio = new Envio();
                    $envio->fecha=$request->fechaentrega;
                    $envio->orden=1;
                    $envio->venta_id=$id;
                }
                $venta->save();
            });
            return is_null($error) ? "OK" : $error;
        }
        if($request->tipo=='pago'){
            $error = DB::transaction(function () use ($request, $id){
                $venta = Venta::find($id);
                if($request->estadoenvio=='CONFORME'){
                    $venta->estado='FINALIZADO';
                }
                $venta->save();
                $pago = new Pago();
                $pago->fecha=$request->fechapago;
                $pago->numero=$request->deposito;
                $pago->estado='COMPLETO';
                $pago->total=$request->total;
                $pago->venta_id=$venta->id;
                $pago->comprobante_id=$venta->comprobante->id;
                $pago->save();
            });
            return is_null($error) ? "OK" : $error;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existe = Libreria::verificarExistencia($id, 'venta');
        if ($existe !== true) {
            return $existe;
        }
        $error = DB::transaction(function () use ($id) {
            $venta = Venta::find($id);
            $venta->delete();
        });
        return is_null($error) ? "OK" : $error;
    }

    public function eliminar($id, $listarLuego)
    {
        $existe = Libreria::verificarExistencia($id, 'venta');
        if ($existe !== true) {
            return $existe;
        }
        $listar = "NO";
        if (!is_null(Libreria::obtenerParametro($listarLuego))) {
            $listar = $listarLuego;
        }
        $modelo   = Venta::find($id);
        $entidad  = 'venta';
        $formData = array('route' => array('venta.destroy', $id), 'method' => 'DELETE', 'class' => 'form-horizontal', 'id' => 'formMantenimiento'.$entidad, 'autocomplete' => 'off');
        $boton    = 'Eliminar';
        return view('reusable.confirmarEliminar')->with(compact('modelo', 'formData', 'entidad', 'boton', 'listar'));
    }
    public function zero_fill($valor, $long = 0)
    {
        return str_pad($valor, $long, '0', STR_PAD_LEFT);
    }

    public function generarNumero(Request $request)
    {
        $año           = date('Y');
        $comprobante = Venta::latest('id')->first();
        if (!is_null($comprobante)) {
            $comprobante->get()->toArray();
            $numero = $comprobante['id'] + 1;
            $numero = $this->zero_fill($numero, 8);
            $numero = 'V2021-' . $numero;
        } else {
            $numero = $this->zero_fill(1, 8);
            $numero = 'V2021-' . $numero;
        }
        echo $numero;
    }

    public function getProducto(Request $request){
        $id = $request->id;
        $producto = Producto::with('inventario')->find($id)->toArray();
        $data=[
            'cantidad'=>$producto['inventario'][0]['cantidad'],
            'precio'=>$producto['preciounitario'],
            'nombre'=>$producto['descripcion'],
            'marca'=>$producto['marca'],
            'codigo'=>$producto['codigo'],
        ];
        return $data;
    }

    public function generarfacturas(Request $request){
        $comprobante = Comprobante::latest('id')->first();
        if (!is_null($comprobante)) {
            $comprobante->get()->toArray();
            $numero = $comprobante['id'] + 1;
            $numero = $this->zero_fill($numero, 8);
            $numero = 'F063-' . $numero;
        } else {
            $numero = $this->zero_fill(1, 8);
            $numero = 'F063-' . $numero;
        }
        echo $numero;

    }

    function exportPdf($id){
        $comprobante = Comprobante::with('venta', 'detallecomprobante.producto', 'cliente')->find($id);
        $data=$comprobante;
        $base = $comprobante->total / 1.18;
        $base=round($base,2);
        $igv = $base * 0.18;
        $igv= round($igv,2);
        $pdf = PDF::loadView('control.ventas.factura', compact('data', 'igv', 'base'))->setPaper('a4');
        

        return $pdf->stream('factura.pdf');
    }
    
}
