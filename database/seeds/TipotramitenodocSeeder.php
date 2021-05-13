<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipotramitenodocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipotramitenodoc')->insert([
            'descripcion' => 'LICENCIAS DE FUNCIONAMIENTO Y AUTORIZACIONES',            
        ]);
        DB::table('tipotramitenodoc')->insert([
            'descripcion' => 'EDIFICACIONES URBANAS (LICENCIA DE EDIFICACIÓN O CONSTRUCCIONES)',
        ]);
        DB::table('tipotramitenodoc')->insert([
            'descripcion' => 'SALUBRIDAD',
        ]);
        DB::table('tipotramitenodoc')->insert([
            'descripcion' => 'DEFENSA CIVIL',
        ]);
    }
}
