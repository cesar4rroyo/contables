<?php

use App\Models\Control\Activo;
use App\Models\Control\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = Producto::count();
        for ($i=1; $i <=$productos ; $i++) { 
            DB::table('inventario')->insert([
                'producto_id' => $i,
                'tipo' => 'PRODUCTOS',
                'cantidad' => rand(0, 100),
            ]);
        }
        $activos = Activo::count();
        for ($i=1; $i <=$activos ; $i++) { 
            DB::table('inventario')->insert([
                'activo_id' => $i,
                'tipo' => 'ACTIVOS',
                'cantidad' => rand(0, 20),
            ]);
        }
    }
}
