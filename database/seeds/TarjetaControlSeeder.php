<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarjetaControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //empleado 1
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-17',
            'horastrabajadas' => 8,
            'empleado_id'=>1,
            'carpetaempleado_id'=>1,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-18',
            'horastrabajadas' => 7,
            'empleado_id'=>1,
            'carpetaempleado_id'=>1,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-19',
            'horastrabajadas' => 8,
            'empleado_id'=>1,
            'carpetaempleado_id'=>1,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-20',
            'horastrabajadas' => 6,
            'empleado_id'=>1,
            'carpetaempleado_id'=>1,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-21',
            'horastrabajadas' => 8,
            'empleado_id'=>1,
            'carpetaempleado_id'=>1,
        ]);
        //empleado 2
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-17',
            'horastrabajadas' => 9,
            'empleado_id'=>2,
            'carpetaempleado_id'=>2,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-18',
            'horastrabajadas' => 7,
            'empleado_id'=>2,
            'carpetaempleado_id'=>2,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-19',
            'horastrabajadas' => 6,
            'empleado_id'=>2,
            'carpetaempleado_id'=>2,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-20',
            'horastrabajadas' => 8,
            'empleado_id'=>2,
            'carpetaempleado_id'=>2,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-21',
            'horastrabajadas' => 8,
            'empleado_id'=>2,
            'carpetaempleado_id'=>2,
        ]);
        //empleado 3
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-17',
            'horastrabajadas' => 8,
            'empleado_id'=>3,
            'carpetaempleado_id'=>3,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-18',
            'horastrabajadas' => 8,
            'empleado_id'=>3,
            'carpetaempleado_id'=>3,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-19',
            'horastrabajadas' => 8,
            'empleado_id'=>3,
            'carpetaempleado_id'=>3,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-20',
            'horastrabajadas' => 8,
            'empleado_id'=>3,
            'carpetaempleado_id'=>3,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-21',
            'horastrabajadas' => 8,
            'empleado_id'=>3,
            'carpetaempleado_id'=>3,
        ]);
        //empleado 4
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-17',
            'horastrabajadas' => 8,
            'empleado_id'=>4,
            'carpetaempleado_id'=>4,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-18',
            'horastrabajadas' => 5,
            'empleado_id'=>4,
            'carpetaempleado_id'=>4,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-19',
            'horastrabajadas' => 8,
            'empleado_id'=>4,
            'carpetaempleado_id'=>4,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-20',
            'horastrabajadas' => 9,
            'empleado_id'=>4,
            'carpetaempleado_id'=>4,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-21',
            'horastrabajadas' => 6,
            'empleado_id'=>4,
            'carpetaempleado_id'=>4,
        ]);
        //empleado 5
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-17',
            'horastrabajadas' => 8,
            'empleado_id'=>5,
            'carpetaempleado_id'=>5,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-18',
            'horastrabajadas' => 8,
            'empleado_id'=>5,
            'carpetaempleado_id'=>5,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-19',
            'horastrabajadas' => 8,
            'empleado_id'=>5,
            'carpetaempleado_id'=>5,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-20',
            'horastrabajadas' => 9,
            'empleado_id'=>5,
            'carpetaempleado_id'=>5,
        ]);
        DB::table('tarjetacontrol')->insert([
            'fecha' => '2021-05-21',
            'horastrabajadas' => 6,
            'empleado_id'=>5,
            'carpetaempleado_id'=>5,
        ]);
    }
}
