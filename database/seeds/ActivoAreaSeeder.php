<?php

use App\Models\Control\Activo;
use App\Models\Control\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivoAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = Area::count();
        $activos = Activo::count();
        for ($i=1; $i < 15; $i++) { 
            DB::table('activoarea')->insert([
                'area_id' => rand(1,$areas),
                'activo_id' => rand(1,$activos),
                'estado'=>'EN USO',
            ]);
        }
        for ($i=1; $i < 5; $i++) { 
            DB::table('activoarea')->insert([
                'area_id' => rand(1,$areas),
                'activo_id' => rand(1,$activos),
                'estado'=>'MALOGRADO',
            ]);
        }
    }
}
