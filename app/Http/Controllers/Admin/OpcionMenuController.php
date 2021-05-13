<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\GrupoMenu;
use App\Models\Admin\OpcionMenu;
use App\Librerias\Libreria;
use App\Models\Control\Area;
use Illuminate\Support\Facades\DB;


class OpcionMenuController extends Controller
{
    protected $folderview      = 'admin.opcionmenu';
    protected $tituloAdmin     = 'Opcion Menú';
    protected $tituloRegistrar = 'Registrar Opcion Menú';
    protected $tituloModificar = 'Modificar Opcion Menú';
    protected $tituloEliminar  = 'Eliminar Opcion Menú';
    protected $rutas           = array(
        'create' => 'opcionmenu.create',
        'edit'   => 'opcionmenu.edit',
        'delete' => 'opcionmenu.eliminar',
        'search' => 'opcionmenu.buscar',
        'index'  => 'opcionmenu.index',
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
        $entidad          = 'opcionmenu';
        $nombre           = Libreria::getParam($request->input('descripcion'));
        $grupomenu_id     = Libreria::getParam($request->input('grupomenu_id'));
        $resultado        = OpcionMenu::listar($nombre, $grupomenu_id);
        $lista            = $resultado->get();
        $cabecera         = array();
        $cabecera[]       = array('valor' => '#', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Descripcion', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Orden', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Icono', 'numero' => '1');
        $cabecera[]       = array('valor' => 'Grupo Menú', 'numero' => '1');
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
        $entidad          = 'opcionmenu';
        $title            = $this->tituloAdmin;
        $titulo_registrar = $this->tituloRegistrar;
        $ruta             = $this->rutas;
        $cboGrupos        = ['' => 'Todos'] + GrupoMenu::pluck('descripcion', 'id')->all();
        return view($this->folderview . '.admin')->with(compact('cboGrupos', 'entidad', 'title', 'titulo_registrar', 'ruta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $listar   = Libreria::getParam($request->input('listar'), 'NO');
        $entidad  = 'opcionmenu';
        $opcionmenu = null;
        $cboGrupos  = ['' => 'Seleccione un grupo'] + GrupoMenu::pluck('descripcion', 'id')->all();
        $formData = array('opcionmenu.store');
        $formData = array('route' => $formData, 'class' => 'form-horizontal', 'id' => 'formMantenimiento' . $entidad, 'autocomplete' => 'off');
        $boton    = 'Registrar';
        return view($this->folderview . '.mant')->with(compact('cboGrupos', 'opcionmenu', 'formData', 'entidad', 'boton', 'listar'));
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
            'descripcion' => 'required',
            'orden' => 'required|integer',
            'icono' => 'required',
            'link' => 'required',
            'grupomenu_id' => 'required',
        );
        $mensajes = array(
            'descripcion.required'         => 'Debe ingresar una descripción',
            'link.required'         => 'Debe ingresar el link',
            'icono.required'         => 'Debe ingresar el Icono',
            'grupomenu_id.required'         => 'Debe ingresar el Grupo de Menú',
        );
        $validacion = Validator::make($request->all(), $reglas, $mensajes);
        if ($validacion->fails()) {
            return $validacion->messages()->toJson();
        }
        $error = DB::transaction(function () use ($request) {
            $opcionmenu = OpcionMenu::create([
                'descripcion' => strtoupper($request->input('descripcion')),
                'orden' => Libreria::getParam($request->input('orden')),
                'icono' => Libreria::getParam($request->input('icono')),
                'link' => Libreria::getParam($request->input('link')),
                'grupomenu_id' => Libreria::getParam($request->input('grupomenu_id')),

            ]);
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
        $existe = Libreria::verificarExistencia($id, 'opcionmenu');
        if ($existe !== true) {
            return $existe;
        }
        $cboGrupos  = ['' => 'Seleccione un grupo'] + GrupoMenu::pluck('descripcion', 'id')->all();
        $listar   = Libreria::getParam($request->input('listar'), 'NO');
        $opcionmenu = OpcionMenu::find($id);
        $entidad  = 'opcionmenu';
        $formData = array('opcionmenu.update', $id);
        $formData = array('route' => $formData, 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'formMantenimiento' . $entidad, 'autocomplete' => 'off');
        $boton    = 'Modificar';
        return view($this->folderview . '.mant')->with(compact('opcionmenu', 'formData', 'entidad', 'boton', 'listar', 'cboGrupos'));
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
        $existe = Libreria::verificarExistencia($id, 'opcionmenu');

        if ($existe !== true) {
            return $existe;
        }
        $reglas     = array(
            'descripcion' => 'required',
            'orden' => 'required|integer',
            'icono' => 'required',
            'link' => 'required',
            'grupomenu_id' => 'integer',
        );
        $mensajes = array(
            'descripcion.required'         => 'Debe ingresar una descripción',
            'link.required'         => 'Debe ingresar el link',
            'icono.required'         => 'Debe ingresar el Icono',
            'grupomenu_id.required'         => 'Debe ingresar el Grupo de Menú',
        );

        $validacion = Validator::make($request->all(), $reglas, $mensajes);
        if ($validacion->fails()) {
            return $validacion->messages()->toJson();
        }
        $error = DB::transaction(function () use ($request, $id) {
            $opcionmenu = OpcionMenu::find($id);
            $opcionmenu->update([
                'descripcion' => strtoupper($request->input('descripcion')),
                'orden' => Libreria::getParam($request->input('orden')),
                'icono' => Libreria::getParam($request->input('icono')),
                'link' => Libreria::getParam($request->input('link')),
                'grupomenu_id' => Libreria::getParam($request->input('grupomenu_id')),

            ]);
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
        $existe = Libreria::verificarExistencia($id, 'opcionmenu');
        if ($existe !== true) {
            return $existe;
        }
        $error = DB::transaction(function () use ($id) {
            $opcionmenu = OpcionMenu::find($id);
            $opcionmenu->delete();
        });
        return is_null($error) ? "OK" : $error;
    }

    public function eliminar($id, $listarLuego)
    {
        $existe = Libreria::verificarExistencia($id, 'opcionmenu');
        if ($existe !== true) {
            return $existe;
        }
        $listar = "NO";
        if (!is_null(Libreria::obtenerParametro($listarLuego))) {
            $listar = $listarLuego;
        }
        $modelo   = OpcionMenu::find($id);
        $entidad  = 'opcionmenu';
        $formData = array('route' => array('opcionmenu.destroy', $id), 'method' => 'DELETE', 'class' => 'form-horizontal', 'id' => 'formMantenimiento' . $entidad, 'autocomplete' => 'off');
        $boton    = 'Eliminar';
        return view('reusable.confirmarEliminar')->with(compact('modelo', 'formData', 'entidad', 'boton', 'listar'));
    }
}
