<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargo')->insert([
            'descripcion' => 'Gerente General',            
        ]);
        DB::table('cargo')->insert([
            'descripcion' => 'Gerente de Área',
        ]);
        DB::table('cargo')->insert([
            'descripcion' => 'Consultor',
        ]);
        DB::table('cargo')->insert([
            'descripcion' => 'Asesor',
        ]);
        DB::table('cargo')->insert([
            'descripcion' => 'Asistente',
        ]);
        DB::table('cargo')->insert([
            'descripcion' => 'Contador',
        ]);
        DB::table('cargo')->insert([
            'descripcion' => 'Encargado',
        ]);
        DB::table('cargo')->insert([
            'descripcion' => 'Empleado',
        ]);
    }
}
