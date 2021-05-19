<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activo')->insert([
            'codigo' => 'ACT-0001',
            'preciocompra' => 180.90,
            'descripcion' => 'Monitor 18 Pulgadas',
            'marca' => 'HP',
        ]);
        
        DB::table('activo')->insert([
            'codigo' => 'ACT-0002',
            'preciocompra' => 299.90,
            'descripcion' => 'Escritorio de Melamina Moscu Roble',
            'marca' => '',
        ]);
        
        DB::table('activo')->insert([
            'codigo' => 'ACT-0004',
            'preciocompra' => 1460.90,
            'descripcion' => 'Escritorio gerencial',
            'marca' => '',
        ]);
        
        DB::table('activo')->insert([
            'codigo' => 'ACT-0005',
            'preciocompra' => 1100.90,
            'descripcion' => 'Computadora de escritorio',
            'marca' => 'HP',
        ]);
        
        DB::table('activo')->insert([
            'codigo' => 'ACT-0006',
            'preciocompra' => 1100.90,
            'descripcion' => 'Estante Zen con Puertas',
            'marca' => '',
        ]);
        
    }
}
