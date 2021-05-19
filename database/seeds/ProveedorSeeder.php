<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //PROVEEDOR TIPO PRODUCTOS
        DB::table('proveedor')->insert([
            'ruc' => '20123465871',
            'tipo' => 'PRODUCTOS',
            'razonsocial' => 'CHICLAYO SOFT. S.A.C',
            'email' => 'chiclayosoft@gamil.com',
            'telefono'=> '987654321',
            'direccion'=> 'AV. LUIS GONZALES 275 - CHICLAYO - LAMBYEQUE',
        ]);
        
        DB::table('proveedor')->insert([
            'ruc' => '20481066094',
            'tipo' => 'PRODUCTOS',
            'razonsocial' => 'HARDTECH SOLUTIONS S.A.C',
            'email' => 'hardtechsol@gamil.com',
            'telefono'=> '981024371',
            'direccion'=> 'JIRÓN SAN MARTÍN 426, TRUJILLO - LA LIBERTAD',
        ]);
        
        DB::table('proveedor')->insert([
            'ruc' => '20538893791',
            'tipo' => 'PRODUCTOS',
            'razonsocial' => 'GRUPO OVALO 24',
            'email' => 'ovalo24group@gamil.com',
            'telefono'=> '(01) 332-1600',
            'direccion'=> 'AV CORONEL FRANSISCO BOLOGNESI 536, CHICLAYO - LAMANAYEQUE',
        ]);
        
        //PROVEEDOR TIPO ACTIVOS
        DB::table('proveedor')->insert([
            'ruc' => '20389230724',
            'tipo' => 'ACTIVOS',
            'razonsocial' => 'SODIMAC PERU S.A.',
            'email' => 'contactosodimac@sodimac.cl',
            'telefono'=> '(01) 2030420',
            'direccion'=> 'AV. VÍCTOR RAUL HAYA DE LA TORRE - CHICLAYO - LAMBAYEQUE',
        ]);
        
        DB::table('proveedor')->insert([
            'ruc' => '20536557858',
            'tipo' => 'ACTIVOS',
            'razonsocial' => 'PROMART CHICLAYO',
            'email' => 'servicioalcliente@promart.pe',
            'telefono'=> '(0800) 00210',
            'direccion'=> 'AV, GENERAL ARENALES 296 - CHICLAYO - LAMBAYEQUE',
        ]);
        
        DB::table('proveedor')->insert([
            'ruc' => '20123465871',
            'tipo' => 'ACTIVOS',
            'razonsocial' => 'CHICLAYO SOFT. S.A.C',
            'email' => 'chiclayosoft@gamil.com',
            'telefono'=> '987654321',
            'direccion'=> 'AV. LUIS GONZALES 275 - CHICLAYO - LAMBYEQUE',
        ]);
    }
}
