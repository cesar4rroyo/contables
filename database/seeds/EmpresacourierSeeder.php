<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresacourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <5 ; $i++) { 
            DB::table('empresacourier')->insert([
                'ruc' => '1523566125'.$i.''.($i+1),            
                'razonsocial' => 'Razon social empresa '.($i+1),            
            ]);
        }
      
    }
}
