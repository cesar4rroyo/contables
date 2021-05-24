<?php

use App\Models\Control\Area;
use App\Models\Control\Proveedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function fecha_aleatoria3($formato = "Y-m-d", $limiteInferior = "2021-01-01", $limiteSuperior = "2021-05-12"){
            // Convertimos la fecha como cadena a milisegundos
            $milisegundosLimiteInferior = strtotime($limiteInferior);
            $milisegundosLimiteSuperior = strtotime($limiteSuperior);
        
            // Buscamos un número aleatorio entre esas dos fechas
            $milisegundosAleatorios = mt_rand($milisegundosLimiteInferior, $milisegundosLimiteSuperior);
        
            // Regresamos la fecha con el formato especificado y los milisegundos aleatorios
            return date($formato, $milisegundosAleatorios);
        }
        function zero_fill($valor, $long = 0)
        {
            return str_pad($valor, $long, '0', STR_PAD_LEFT);
        }
        for ($i=1; $i < 100; $i++) { 
            DB::table('compra')->insert([
                'numero' => 'CPROD2021-' . zero_fill($i,8),
                'fechasolicitud'=>fecha_aleatoria3(),
                'fechaesperada'=>Carbon::now()->subDays(10),
                'fechaentrega'=>Carbon::now()->subDays(9),
                'factura'=>'F000'.rand(1,9) . '-' . zero_fill(rand(1,900), 8),
                'estado'=>'FINALIZADO',
                'tipo'=>'PRODUCTOS',
                'total'=>rand(500,15000),
                'proveedor_id'=>rand(1, Proveedor::count()),
            ]);
        }
        for ($i=1; $i < 80; $i++) { 
            DB::table('compra')->insert([
                'numero' => 'CACT2021-000' . zero_fill($i,8),
                'fechasolicitud'=>fecha_aleatoria3(),
                'fechaesperada'=>Carbon::now()->subDays(10),
                'fechaentrega'=>Carbon::now()->subDays(9),
                'factura'=>'F000'.rand(1,9) . '-' . zero_fill(rand(1,500), 8),
                'estado'=>'FINALIZADO',
                'tipo'=>'ACTIVOS',
                'total'=>rand(500,15000),
                'proveedor_id'=>rand(1, Proveedor::count()),
                'area_id'=>rand(1, Area::count()),
            ]);
        }
        
    }
}
