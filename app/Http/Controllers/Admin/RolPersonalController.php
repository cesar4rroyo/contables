<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Personal;
use App\Models\Admin\Rol;

class RolPersonalController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $roles = Rol::orderBy('id')->pluck('descripcion', 'id')->toArray();
        $personas = Personal::with('roles')->get();
        $personasroles = Personal::with('roles')
            ->get()
            ->pluck('roles', 'id')
            ->toArray();
        // dd($personas);
        return view('admin.rolpersona.index', compact('roles', 'personasroles', 'personas'));
    }


    public function store(Request $request)
    {
        if ($request->ajax()) {
            $personas = new Personal();
            if ($request->input('estado') == 1) {
                $personas->find($request->input('persona_id'))->roles()->attach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se asigno correctamente']);
            } else {
                $personas->find($request->input('persona_id'))->roles()->detach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se elimino correctamente']);
            }
        } else {
            abort(404);
        }
    }
}
