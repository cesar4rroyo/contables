<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personal')->insert([
            'nombres' => 'JHANCARLOS',
            'apellidopaterno' => 'BRAVO',
            'apellidomaterno' => 'PEÑA',
            'dni' => '73679627',
            'telefono' => '974165087',
            'email'=>'jhancarlos@unprg.edu',
            'direccion'=>'AV. LOS ANDES N°25 - MIRAFLORES - TUMÁN',
            'area_id'=>4,
            'cargo_id'=>1
        ]);
        DB::table('personal')->insert([
            'nombres' => 'DIEGO',
            'apellidopaterno' => 'VÁSQUEZ',
            'apellidomaterno' => 'ARAUJO',
            'dni' => '72845403',
            'telefono' => '983517083',
            'email'=>'dvasquezar@unprg.edu.pe',
            'area_id'=>3,
            'direccion'=>'POR LA GALLERA :v',
            'cargo_id'=>1

        ]);
        DB::table('personal')->insert([
            'nombres' => 'RENZO DAVID',
            'apellidopaterno' => 'TORRES',
            'apellidomaterno' => 'ACOSTA',
            'dni' => '73748713',
            'telefono' => '933566145',
            'email'=>'rtorresa@unprg.edu.pe',
            'direccion'=>'CALLE CAPAC YUPANQUI 971 - LA VICTORIA',
            'area_id'=>2,
            'cargo_id'=>1
        ]);
        DB::table('personal')->insert([
            'nombres' => 'CÉSAR DAVID',
            'apellidopaterno' => 'ARROYO',
            'apellidomaterno' => 'TORRES',
            'dni' => '71482136',
            'telefono' => '924734626',
            'email' => 'carroyot@unprg.edu.pe',
            'area_id'=>1,
            'direccion'=>'AV. ANTENOR ORREGO MZ.B LT. 10 - LA VICTORIA',
            'cargo_id'=>1
        ]);

        DB::table('personal')->insert([
            'nombres' => 'Admin',
            'apellidopaterno' => 'Admin',
            'apellidomaterno' => '',
            'dni' => '11111111',
            'telefono' => '999999999',
            'area_id'=>1,
            'cargo_id'=>1
        ]);

        DB::table('personal')->insert([
            'nombres' => 'JOSÉ REYNALDO',
            'apellidopaterno' => 'ZAFRA',
            'apellidomaterno' => 'VARGAS',
            'dni' => '71484638',
            'telefono' => '934466163',
            'email' => 'jzafrav@unprg.edu.pe',
            'area_id'=>1,
            'direccion'=>'CALLE INCANATO 464 - JOSÉ LEONARDO ORTIZ',
            'cargo_id'=>1
        ]);
        //proveedores
        
    }
}
