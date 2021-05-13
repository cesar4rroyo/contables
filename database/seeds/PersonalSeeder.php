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
            'nombres' => 'Santiago Ronald',
            'apellidopaterno' => 'Rodas',
            'apellidomaterno' => 'Ipanaque',
            'dni' => '45841576',
            'telefono' => '974866028',
            'area_id'=>4,
            'cargo_id'=>1
        ]);
        DB::table('personal')->insert([
            'nombres' => 'Richard',
            'apellidopaterno' => 'Serrano',
            'apellidomaterno' => 'Bautista',
            'dni' => '75020436',
            'telefono' => '986783159',
            'area_id'=>3,
            'cargo_id'=>1

        ]);
        DB::table('personal')->insert([
            'nombres' => 'Juan Eduardo',
            'apellidopaterno' => 'Bazan',
            'apellidomaterno' => 'Guerrero',
            'dni' => '45841576',
            'telefono' => '932827302',
            'area_id'=>2,
            'cargo_id'=>1
        ]);
        DB::table('personal')->insert([
            'nombres' => 'César',
            'apellidopaterno' => 'Arroyo',
            'apellidomaterno' => 'Torres',
            'dni' => '71482136',
            'telefono' => '924734626',
            'area_id'=>1,
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
    }
}
