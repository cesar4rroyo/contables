<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargo')->insert([
            'descripcion' => 'Cargo 1',            
        ]);
        DB::table('cargo')->insert([
            'descripcion' => 'Cargo 2',
        ]);
    }
}
