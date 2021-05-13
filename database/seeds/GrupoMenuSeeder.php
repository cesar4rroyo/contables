<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupomenu')->insert([
            'descripcion' => 'Gestion documentos',
            'icono' => 'fas fa-folder',
            'orden' => 1,
        ]);
        DB::table('grupomenu')->insert([
            'descripcion' => 'Control',
            'icono' => 'fas fa-users-cog',
            'orden' => 2,
        ]);
        DB::table('grupomenu')->insert([
            'descripcion' => 'Personal',
            'icono' => 'fas fa-user-tie',
            'orden' => 3,
        ]);
        DB::table('grupomenu')->insert([
            'descripcion' => 'Usuarios',
            'icono' => 'fas fa-users',
            'orden' => 4,
        ]);    
        DB::table('grupomenu')->insert([
            'descripcion' => 'Reportes',
            'icono' => 'fas fa-chart-line',
            'orden' => 5,
        ]);    
    }
}
