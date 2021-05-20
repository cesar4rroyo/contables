<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('area')->insert([
            'descripcion' => 'Área de Ventas', 
        ]);
        DB::table('area')->insert([
            'descripcion' => 'Area de Tesorería',
        ]);
        DB::table('area')->insert([
            'descripcion' => 'Area de Compras',
        ]);
        DB::table('area')->insert([
            'descripcion' => 'Area de Almacén',
        ]);
        DB::table('area')->insert([
            'descripcion' => 'Area de Recepcion',
        ]);
        DB::table('area')->insert([
            'descripcion' => 'Area de Nóminas',
        ]);
        DB::table('area')->insert([
            'descripcion' => 'Area de RRHH',
        ]);
        DB::table('area')->insert([
            'descripcion' => 'Area de Contabilidad',
        ]);
        DB::table('area')->insert([
            'descripcion' => 'Area de Cuentas por Pagar',
        ]);
    }
}
