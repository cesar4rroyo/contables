<?php

namespace App\Http\Controllers\Control;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Librerias\Libreria;
use App\Models\Admin\Personal;
use App\Models\Control\Carpetaempleado;
use App\Models\Control\Cheque;
use App\Models\Control\Impuesto;
use App\Models\Control\Nomina;
use App\Models\Control\Seguimiento;

class NominaController extends Controller
{
    protected $folderview      = 'control.nominas';
    protected $tituloAdmin     = 'Compra';
    protected $tituloRegistrar = 'Registrar Nomina';
    protected $tituloModificar = 'Modificar Nomina';
    protected $tituloEliminar  = 'Eliminar Nomina';
    protected $rutas           = array(
        'create' => 'nomina.create',
        'edit'   => 'nomina.edit',
        'delete' => 'nomina.eliminar',
        'search' => 'nomina.buscar',
        'index'  => 'nomina.index',
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
        $entidad          = 'nomina';
        $nombres          = Libreria::getParam($request->input('numero_search'));
        $fecinicio        = Libreria::getParam($request->input('fechainicio'));
        $fecfin           = Libreria::getParam($request->input('fechafin'));
        $resultado        = Nomina::listar($nombres, $fecinicio, $fecfin); 
        $lista            = $resultado->get();
        $cabecera         = array();
        $cabecera[]       = array('valor' => '#', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Fecha Registro', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Total', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Estado', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Empleado', 'numero' => '1');
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
        $entidad          = 'nomina';
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
        $entidad  = 'nomina';
        $nomina = null;
        $tipo = null;
        $formData = array('nomina.store');
        $cboempleado = [''=>'Seleccione una opcion'] + Personal::select(DB::raw('CONCAT(apellidopaterno, " ", apellidomaterno, " ", nombres) AS full_name2'), 'id')->whereNotNull('cargo_id')->pluck('full_name2', 'id')->all();
        $formData = array('route' => $formData, 'class' => 'form-horizontal', 'id' => 'formMantenimiento' . $entidad, 'autocomplete' => 'off');
        $boton    = 'Registrar';
        $impuestos = ["" => "Seleccione un impuesto"];
        $impuestos += Impuesto::pluck('descripcion', 'cantidad')->all();
        return view($this->folderview . '.mant')->with(compact('nomina', 'formData', 'entidad', 'boton', 'listar', 'cboempleado', 'impuestos', 'tipo'));
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
            'fecha' => 'required',
            'empleado' => 'required',
            'impuesto' => 'required',
        );
        $mensajes = array(
            'fecha.required'         => 'Debe ingresar la fecha',
            'empleado.required'         => 'Debe ingresar un empleado',
            'impuesto.required'         => 'Debe ingresar el impuesto',
        );
        
        $validacion = Validator::make($request->all(), $reglas, $mensajes);
        if ($validacion->fails()) {
            return $validacion->messages()->toJson();
        }
        $usuario = session()->get('personal');
        $error = DB::transaction(function () use ($request, $usuario) {
            $impuesto = Impuesto::where('cantidad', $request->impuesto)->first();
            $carpeta = Carpetaempleado::where('empleado_id', $request->empleado)->first();
            $nomina = new Nomina();
            $nomina->fecha=$request->fecha;
            $nomina->estado="REGISTRADO";
            $nomina->empleado_id=$request->empleado;
            $nomina->carpetaempleado_id=$carpeta->id;
            $nomina->total=$request->total;
            $nomina->impuesto_id=$impuesto->id;
            $nomina->save();
            $seguimiento = new Seguimiento();
            $seguimiento->fecha=date("Y-m-d H:i:s");
            $seguimiento->accion='REGISTRO FORMULARIO DE NOMINA';
            $seguimiento->orden=1;
            $seguimiento->nomina_id=$nomina->id;
            $seguimiento->save();

            //$seguimiento->usuario_id= $usuario['id'];
            //$seguimiento->area_id= $usuario['id'];
                        

            
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
        $existe = Libreria::verificarExistencia($id, 'nomina');
        if ($existe !== true) {
            return $existe;
        }
        $tipo = $request->tipo ? $request->tipo : null;
        $listar   = Libreria::getParam($request->input('listar'), 'NO');
        $nomina = Nomina::find($id);
        $entidad  = 'nomina';
        $cboempleado = [''=>'Seleccione una opcion'] + Personal::select(DB::raw('CONCAT(apellidopaterno, " ", apellidomaterno, " ", nombres) AS full_name2'), 'id')->whereNotNull('cargo_id')->pluck('full_name2', 'id')->all();
        $impuestos = ["" => "Seleccione un impuesto"];
        $impuestos += Impuesto::pluck('descripcion', 'cantidad')->all();
        $formData = array('nomina.update', $id);
        $formData = array('route' => $formData, 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'formMantenimiento' . $entidad, 'autocomplete' => 'off');
        $boton    = 'Aceptar';
        return view($this->folderview . '.mant')->with(compact('nomina', 'formData', 'entidad', 'boton', 'listar', 'impuestos', 'cboempleado', 'tipo'));
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
        $existe = Libreria::verificarExistencia($id, 'nomina');
        if ($existe !== true) {
            return $existe;
        }
   
            $reglas     = array(
                'fecha' => 'required',
            );
            $mensajes = array(
                'fecha.required'         => 'Debe ingresar la fecha',
            );
        $validacion = Validator::make($request->all(), $reglas, $mensajes);
        if ($validacion->fails()) {
            return $validacion->messages()->toJson();
        }

        if($request->tipo=='autorizar'){
            $error = DB::transaction(function () use ($request, $id){
                $nomina = Nomina::find($id);
                if($request->estadoenvio=='AUTORIZAR'){
                    $nomina->estado='AUTORIZADO POR RESPONS. CUENTAS';
                }else{
                    $nomina->estado = 'CON OBSERVACION';
                }
                $nomina->save();
            });
            return is_null($error) ? "OK" : $error;
        }
        if($request->tipo=='preparar'){
            $error = DB::transaction(function () use ($request, $id){
                $nomina = Nomina::find($id);
                $nomina->estado='CHEQUE PREPARADO';
                $cheque = new Cheque();
                $cheque->fecha=date("Y-m-d H:i:s");
                $cheque->numero='CHNOM-2021-000' . $nomina->id;
                $cheque->tipo='PAGO NOMINAS';
                $cheque->cantidad=$nomina->total;
                $cheque->beneficiario=$request->beneficiario;
                $cheque->banco=$request->banco;
                $cheque->cuenta=$request->cuenta;
                $cheque->nomina_id=$nomina->id;
                $cheque->save();
                $nomina->save();
            });
            return is_null($error) ? "OK" : $error;
        }
        if($request->tipo=='distribuir'){
            $error = DB::transaction(function () use ($request, $id){
                $nomina = Nomina::find($id);
                $nomina->estado='PAGO DISTRIBUIDO';
                $nomina->save();
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

    public function generarNumero(Request $request)
    {
        $año           = date('Y');
        $numerotramite = Compra::NumeroSigue($año);
        echo 'CPDT-' . $año."-" . $numerotramite;
    }
}
