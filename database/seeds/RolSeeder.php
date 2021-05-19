<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rol')->insert([
            'descripcion' => 'Usuario',
        ]);
        DB::table('rol')->insert([
            'descripcion' => 'Empleado',
        ]);
        DB::table('rol')->insert([
            'descripcion' => 'Cliente',
        ]);
        DB::table('rol')->insert([
            'descripcion' => 'Empresa',
        ]);
    }
}
