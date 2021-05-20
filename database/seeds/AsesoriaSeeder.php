<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsesoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function fecha_aleatoria($formato = "Y-m-d", $limiteInferior = "2020-01-01", $limiteSuperior = "2021-05-05"){
            // Convertimos la fecha como cadena a milisegundos
            $milisegundosLimiteInferior = strtotime($limiteInferior);
            $milisegundosLimiteSuperior = strtotime($limiteSuperior);
        
            // Buscamos un número aleatorio entre esas dos fechas
            $milisegundosAleatorios = mt_rand($milisegundosLimiteInferior, $milisegundosLimiteSuperior);
        
            // Regresamos la fecha con el formato especificado y los milisegundos aleatorios
            return date($formato, $milisegundosAleatorios);
        }

        for ($i=1; $i < 50; $i++) { 
            DB::table('asesoria')->insert([
                'fecha' => fecha_aleatoria(),
                'cliente_id' => rand(22,37),
                'empleado_id' => rand(1,3),
            ]);
        }
    }
}
