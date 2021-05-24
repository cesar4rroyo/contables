<?php

use App\Models\Control\Venta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnvioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= Venta::count(); $i++) { 
            DB::table('envio')->insert([
                'fecha'=> Venta::find($i)->fechaenvio,
                'orden'=>1,
                'venta_id'=>$i,
            ]);
        }
    }
}
