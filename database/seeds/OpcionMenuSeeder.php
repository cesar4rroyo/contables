<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpcionMenuSeeder extends Seeder
{
    
    public function run()
    {
        //start Grupo Personal
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Personal',
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
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Procedimiento',
            'icono' => 'far fa-file-alt',
            'link' => 'procedimiento',
            'orden' => 2,
            'grupomenu_id' => 2
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Motivo rechazo',
            'icono' => 'fas fa-book-open',
            'link' => 'motivorechazo',
            'orden' => 3,
            'grupomenu_id' => 2
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Motivo courier',
            'icono' => 'fas fa-book-open',
            'link' => 'motivocourier',
            'orden' => 4,
            'grupomenu_id' => 2
        ]); 
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Empresa courier',
            'icono' => 'fas fa-book-open',
            'link' => 'empresacourier',
            'orden' =>5,
            'grupomenu_id' => 2
        ]); 

        DB::table('opcionmenu')->insert([
            'descripcion' => 'Archivador',
            'icono' => 'far fa-file-alt',
            'link' => 'archivador',
            'orden' =>6,
            'grupomenu_id' => 2
        ]); 
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Tipo de Documento',
            'icono' => 'far fa-file-alt',
            'link' => 'tipodocumento',
            'orden' =>7,
            'grupomenu_id' => 2
        ]); 
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Tipo de trámite',
            'icono' => 'far fa-file-alt',
            'link' => 'tipotramitenodoc',
            'orden' =>8,
            'grupomenu_id' => 2
        ]); 
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Subtipo de trámite',
            'icono' => 'far fa-file-alt',
            'link' => 'subtipotramitenodoc',
            'orden' =>9,
            'grupomenu_id' => 2
        ]); 
        //end Control
        //start Gestion documentos        
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Trámites',
            'icono' => 'far fa-file-alt',
            'link' => 'tramite',
            'orden' => 2,
            'grupomenu_id' => 1
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Órdenes de Pago',
            'icono' => 'fas fa-file-invoice-dollar',
            'link' => 'ordenpago',
            'orden' => 3,
            'grupomenu_id' => 1
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Inspección',
            'icono' => 'far fa-lightbulb',
            'link' => 'inspeccion',
            'orden' => 4,
            'grupomenu_id' => 1
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Resolucion',
            'icono' => 'far fa-file-invoice',
            'link' => 'resolucion',
            'orden' => 5,
            'grupomenu_id' => 1
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Notificación o Carta',
            'icono' => 'far fa-file-invoice',
            'link' => 'carta',
            'orden' => 6,
            'grupomenu_id' => 1
        ]);
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
            'descripcion' => 'Reporte trámites',
            'icono' => 'fas fa-chart-line',
            'link' => 'reportetramite',
            'orden' => 1,
            'grupomenu_id' => 5
        ]);
        DB::table('opcionmenu')->insert([
            'descripcion' => 'Reporte Inspección',
            'icono' => 'fas fa-chart-line',
            'link' => 'reporteInspeccion',
            'orden' => 2,
            'grupomenu_id' => 5
        ]);

        //end Grupo Reportes

    }
}
