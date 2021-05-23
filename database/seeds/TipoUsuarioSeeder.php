<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipousuario')->insert([
            'descripcion' => 'Administrador Principal',
        ]);
        DB::table('tipousuario')->insert([
            'descripcion' => 'Administrador',
        ]);
        DB::table('tipousuario')->insert([
            'descripcion'=>'Personal'
        ]);  
        DB::table('tipousuario')->insert([
            'descripcion'=>'Ventas'
        ]);  
        DB::table('tipousuario')->insert([
            'descripcion'=>'Compras'
        ]);  
        DB::table('tipousuario')->insert([
            'descripcion'=>'Nominas'
        ]);  
        DB::table('tipousuario')->insert([
            'descripcion'=>'Activos'
        ]);  
        DB::table('tipousuario')->insert([
            'descripcion'=>'Conversion'
        ]);  
    }
}
