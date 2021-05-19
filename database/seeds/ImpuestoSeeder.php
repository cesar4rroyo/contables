<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImpuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('impuesto')->insert([
            'descripcion' => 'IMPUESTO A LA RENTA',
            'cantidad' => 18.2,
        ]);

        DB::table('impuesto')->insert([
            'descripcion' => 'IMPUESTO GENERAL A LAS VENTAS',
            'cantidad' => 16,
        ]);

        DB::table('impuesto')->insert([
            'descripcion' => 'IMPUESTO A ESSALUD',
            'cantidad' => 9,
        ]);

        DB::table('impuesto')->insert([
            'descripcion' => 'IMPUESTO A AFP',
            'cantidad' => 10,
        ]);

    }
}
