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
            'razonsocial' => 'LIMA SOFT. S.A.C',
            'email' => 'limasoft@gmail.com',
            'telefono'=> '987654321',
            'direccion'=> 'AV. AREQUIPA 275 - LIMA - LIMA',
        ]);
        
        DB::table('proveedor')->insert([
            'ruc' => '20481066094',
            'tipo' => 'PRODUCTOS',
            'razonsocial' => 'HARDTECH SOLUTIONS S.A.C',
            'email' => 'hardtechsol@gmail.com',
            'telefono'=> '981024371',
            'direccion'=> 'JIRÓN SAN MARTÍN 426, TRUJILLO - LA LIBERTAD',
        ]);
        
        DB::table('proveedor')->insert([
            'ruc' => '20538893791',
            'tipo' => 'PRODUCTOS',
            'razonsocial' => 'GRUPO OVALO 24',
            'email' => 'ovalo24group@gmail.com',
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
            'email' => 'chiclayosoft@gmail.com',
            'telefono'=> '987654321',
            'direccion'=> 'AV. LUIS GONZALES 275 - CHICLAYO - LAMBYEQUE',
        ]);
        DB::table('proveedor')->insert([
            'ruc' => '20539160070',
            'tipo' => 'ACTIVOS',
            'razonsocial' => 'MOBEL TORRES S.A.C',
            'email' => 'mobeltorres@gmail.com',
            'telefono'=> '(074) 236524',
            'direccion'=> 'AV. MIGUEL GARU 662, CHICLAYO - LAMBYEQUE',
        ]);

DB::table('proveedor')->insert([
            'ruc' => '20112273922',
            'tipo' => 'ACTIVOS',
            'razonsocial' => 'MAESTRO HOME CENTER S.A.',
            'email' => 'maestrostore@gmail.com',
            'telefono'=> '(01) 4192000',
            'direccion'=> 'CRUCE DE CALLE LORETO CON CALLE, Ca. JUAN BUENDIA, CHICLAYO - LAMBYEQUE',
        ]);

DB::table('proveedor')->insert([
            'ruc' => '20560067373',
            'tipo' => 'ACTIVOS',
            'razonsocial' => 'MELANORTH S.A.C',
            'email' => 'maestrostore@gmail.com',
            'telefono'=> '902 476 931',
            'direccion'=> 'AV. UNION N°10 2nd FLOOR, CHICLAYO - LAMBYEQUE',
        ]);

DB::table('proveedor')->insert([
            'ruc' => '20331429601',
            'tipo' => 'PRODUCTOS',
            'razonsocial' => 'LA CURACAO',
            'email' => 'curacaosac@gmail.com',
            'telefono'=> '(01) 2002870',
            'direccion'=> 'AV. SALAVERRY 710, CHICLAYO - LAMBYEQUE',
        ]);

DB::table('proveedor')->insert([
            'ruc' => '20606230029',
            'tipo' => 'PRODUCTOS',
            'razonsocial' => 'JDL TECNOLOGIA',
            'email' => 'jdltecnología@gmail.com',
            'telefono'=> '950 933 707',
            'direccion'=> 'CALLE, ALFREDO LAPOINT 920, CHICLAYO - LAMBYEQUE',
        ]);

DB::table('proveedor')->insert([
            'ruc' => '20553969493',
            'tipo' => 'PRODUCTOS',
            'razonsocial' => 'COMPUTER HOUSE',
            'email' => 'computerhouse@gmail.com',
            'telefono'=> '(074) 222713',
            'direccion'=> 'CALLE JUAN CUGLIVEAN 769, CHICLAYO - LAMBYEQUE',
        ]);
    }
}
