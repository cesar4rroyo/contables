<?php

use App\Models\Control\Asesoria;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function fecha_aleatoria4($formato = "Y-m-d", $limiteInferior = "2021-01-01", $limiteSuperior = "2021-05-12"){
            // Convertimos la fecha como cadena a milisegundos
            $milisegundosLimiteInferior = strtotime($limiteInferior);
            $milisegundosLimiteSuperior = strtotime($limiteSuperior);
        
            // Buscamos un número aleatorio entre esas dos fechas
            $milisegundosAleatorios = mt_rand($milisegundosLimiteInferior, $milisegundosLimiteSuperior);
        
            // Regresamos la fecha con el formato especificado y los milisegundos aleatorios
            return date($formato, $milisegundosAleatorios);
        }
        function zero_fill2($valor, $long = 0)
        {
            return str_pad($valor, $long, '0', STR_PAD_LEFT);
        }
        for ($i=1; $i < 40; $i++) { 
            DB::table('venta')->insert([
                'numero' => 'V2021-' . zero_fill2($i,8),
                'fecharegistro'=>Carbon::now()->subMonths(4)->subDays(6),
                'fechaenvio'=>Carbon::now()->subMonths(4)->subDays(rand(1,5)),
                'estado'=>'FINALIZADO',
                'total'=>rand(500,90000),
                'cliente_id'=>rand(35,49),
                'asesoria_id'=>rand(1, Asesoria::count()),
            ]);
        }
        for ($i=40; $i < 75; $i++) { 
            DB::table('venta')->insert([
                'numero' => 'V2021-' . zero_fill2($i,8),
                'fecharegistro'=>Carbon::now()->subMonths(4)->subDays(6),
                'fechaenvio'=>Carbon::now()->subMonths(4)->subDays(rand(1,5)),
                'estado'=>'FINALIZADO',
                'total'=>rand(500,90000),
                'cliente_id'=>rand(35,49),
            ]);
        }
        for ($i=75; $i < 100; $i++) { 
            DB::table('venta')->insert([
                'numero' => 'V2021-' . zero_fill2($i,8),
                'fecharegistro'=>Carbon::now()->subMonths(3)->subDays(12),
                'fechaenvio'=>Carbon::now()->subMonths(3)->subDays(rand(1,11)),
                'estado'=>'FINALIZADO',
                'total'=>rand(500,90000),
                'cliente_id'=>rand(35,49),
                'asesoria_id'=>rand(1, Asesoria::count()),
            ]);
        }
        for ($i=100; $i < 150; $i++) { 
            DB::table('venta')->insert([
                'numero' => 'V2021-' . zero_fill2($i,8),
                'fecharegistro'=>Carbon::now()->subMonths(2)->subDays(4),
                'fechaenvio'=>Carbon::now()->subMonths(2)->subDays(rand(1,3)),
                'estado'=>'FINALIZADO',
                'total'=>rand(500,90000),
                'cliente_id'=>rand(35,49),
            ]);
        }
    }
}
