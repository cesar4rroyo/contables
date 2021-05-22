<?php

use App\Models\Admin\Personal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarpetaEmpleadoSeeder extends Seeder
{
    
    public function run()
    {
        $empleados = Personal::whereNotNull('cargo_id')->count();
        for ($i=1; $i < $empleados; $i++) { 
            DB::table('carpetaempleado')->insert([
                'salario' => rand(400,1500),
                'empleado_id' => $i,
                'cuenta'=>"305-33178528-0-8".$i,
                'banco'=>'BCP',
            ]);
        }
    }
}
