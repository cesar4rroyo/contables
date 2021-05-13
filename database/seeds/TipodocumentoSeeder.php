<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipodocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) { 
            DB::table('tipodocumento')->insert([
                'descripcion' => 'Tipo doc'.($i+1),            
            ]);
        }
        
        
    }
}
