<?php

use App\Models\Control\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpcionMenuSeeder extends Seeder
{
    
    public function run()
    {
        //start Grupo Personal
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Persona',
            'icono' => 'fas fa-user-alt',
            'link' => 'persona',
            'orden' => 1,
            'grupomenu_id' => 3
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Cargos',
            'icono' => 'fas fa-address-card',
            'link' => 'cargo',
            'orden' => 3,
            'grupomenu_id' => 3
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Area',
            'icono' => 'fas fa-warehouse',
            'link' => 'area',
            'orden' => 2,
            'grupomenu_id' => 3
        ]);
        //end Grupo Persona
        
        //start Control        
        
        //end Control
        //start Gestion documentos        
       
       /*  DB::table('opcionmenu')->insert([
            'descripcion' => 'Solicitud o Expediente',
            'icono' => 'far fa-file-alt',
            'link' => 'solicitud',
            'orden' => 6,
            'grupomenu_id' => 1
        ]); */
                  
        //end Gestion documentos

        //start Grupo Usuarios
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Usuario',
            'link' => 'admin/usuario',
            'icono' => 'fas fa-user',
            'orden' => 1,
            'grupomenu_id' => 4
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Roles',
            'link' => 'admin/rol',
            'icono' => 'fas fa-users-cog',
            'orden' => 2,
            'grupomenu_id' => 4
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Rol Persona',
            'icono' => 'fas fa-user-plus',
            'link' => 'admin/rolpersona',
            'orden' => 3,
            'grupomenu_id' => 4
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Tipos Usuario',
            'icono' => 'fas fa-users-slash',
            'link' => 'admin/tipousuario',
            'orden' => 4,
            'grupomenu_id' => 4
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Accesos',
            'link' => 'admin/acceso',
            'icono' => 'fas fa-people-arrows',
            'orden' => 3,
            'grupomenu_id' => 4
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Opciones de Menú',
            'icono' => 'fas fa-stream',
            'link' => 'admin/opcionmenu',
            'orden' => 6,
            'grupomenu_id' => 4
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Grupos de Menú',
            'icono' => 'fas fa-list-ol',
            'link' => 'admin/grupomenu',
            'orden' => 7,
            'grupomenu_id' => 4
        ]);
        //end Grupo Usuarios

        //Grupo reportes
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Reporte de Inventario de Productos',
            'icono' => 'fas fa-list-ol',
            'link' => 'reporteinventario',
            'orden' => 1,
            'grupomenu_id' => 5
        ]);


        DB::table('opcionmenu')->insert([
            'descripcion' => 'Compras',
            'icono' => 'fas fa-list-ol',
            'link' => 'compra',
            'orden' => 1,
            'grupomenu_id' => 7
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Ventas',
            'icono' => 'fas fa-list-ol',
            'link' => 'venta',
            'orden' => 2,
            'grupomenu_id' => 6
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Activos Fijos',
            'icono' => 'fas fa-list-ol',
            'link' => 'compraactivos',
            'orden' => 3,
            'grupomenu_id' => 7
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Asesoria',
            'icono' => 'fas fa-list-ol',
            'link' => 'asesoria',
            'orden' => 4,
            'grupomenu_id' => 6
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Nominas',
            'icono' => 'fas fa-list-ol',
            'link' => 'nomina',
            'orden' => 5,
            'grupomenu_id' => 8
        ]);

        //end Grupo Reportes
    }
}
