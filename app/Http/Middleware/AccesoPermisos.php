<?php

namespace App\Http\Middleware;

use App\Models\Admin\OpcionMenu;
use Closure;
use Illuminate\Support\Facades\DB;

class AccesoPermisos
{
    public function handle($request, Closure $next)
    {
        $ruta = $request->path();
        if(str_contains($ruta, '/')){
            $ruta = explode('/', $ruta);
            $ruta = $ruta[0];
        }


        if ($this->permiso($ruta)) {
            return $next($request);
        } else {
            return redirect('/dashboard')->with('warning', 'No cuentas con permisos para ingresar a esta seccion');
        }
    }

    private function permiso($ruta)
    {
        if($ruta=='dashboard'){
            return true;
        }

        $opcion = OpcionMenu::where('link', '=', $ruta)->get()->toArray();
        $tipousuario_id = session()->get('tipousuario_id');
        $final = DB::table('acceso')    
            ->where('opcionmenu_id', '=', $opcion[0]['id'])
            ->where('tipousuario_id', '=', $tipousuario_id)
            ->get()
            ->toArray();
        if (count($final) != 0) {
            return true;
        } else {
            return false;
        }
    }
}
