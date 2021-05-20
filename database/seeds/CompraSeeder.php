<?php

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
        function fecha_aleatoria2($formato = "Y-m-d", $limiteInferior = "2020-05-05", $limiteSuperior = "2021-10-10"){
            // Convertimos la fecha como cadena a milisegundos
            $milisegundosLimiteInferior = strtotime($limiteInferior);
            $milisegundosLimiteSuperior = strtotime($limiteSuperior);
        
            // Buscamos un número aleatorio entre esas dos fechas
            $milisegundosAleatorios = mt_rand($milisegundosLimiteInferior, $milisegundosLimiteSuperior);
        
            // Regresamos la fecha con el formato especificado y los milisegundos aleatorios
            return date($formato, $milisegundosAleatorios);
        }
        for ($i=1; $i < 15; $i++) { 
            DB::table('compra')->insert([
                'numero' => '2021-' . $i,
                'fechasolicitud'=>fecha_aleatoria2(),
                'fechaesperada'=>Carbon::now(),
                //'fechaentrega'=>Carbon::now(),
                'estado'=>'EN ESPERA',
                'tipo'=>'PRODUCTOS',
                'total'=>rand(500,15000),
                'proveedor_id'=>rand(1, Proveedor::count()),
            ]);
        }
        for ($i=1; $i < 15; $i++) { 
            DB::table('compra')->insert([
                'numero' => '2021-' . $i,
                'fechasolicitud'=>fecha_aleatoria2(),
                'fechaesperada'=>Carbon::now(),
                //'fechaentrega'=>Carbon::now(),
                'estado'=>'EN ESPERA',
                'tipo'=>'ACTIVOS',
                'total'=>rand(500,15000),
                'proveedor_id'=>rand(1, Proveedor::count()),
            ]);
        }
        for ($i=15; $i < 30; $i++) { 
            DB::table('compra')->insert([
                'numero' => '2021-' . $i,
                'fechasolicitud'=>fecha_aleatoria2(),
                'fechaesperada'=>Carbon::now()->subDays(2),
                'fechaentrega'=>Carbon::now(),
                'estado'=>'ENTREGADO',
                'tipo'=>'PRODUCTOS',
                'total'=>rand(500,15000),
                'proveedor_id'=>rand(1, Proveedor::count()),
            ]);
        }
        for ($i=15; $i < 30; $i++) { 
            DB::table('compra')->insert([
                'numero' => '2021-' . $i,
                'fechasolicitud'=>fecha_aleatoria2(),
                'fechaesperada'=>Carbon::now()->subDays(2),
                'fechaentrega'=>Carbon::now(),
                'estado'=>'ENTREGADO',
                'tipo'=>'ACTIVOS',
                'total'=>rand(500,25000),
                'proveedor_id'=>rand(1, Proveedor::count()),
            ]);
        }
    }
}
