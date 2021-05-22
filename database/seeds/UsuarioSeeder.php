<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'login' => 'admin',
            'password' => bcrypt('admin'),
            'tipousuario_id' => 1,
            'personal_id'=>5,
        ]);
        DB::table('usuario')->insert([
            'login' => 'danielito',
            'password' => bcrypt('danielito'),
            'tipousuario_id' => 2,
            'personal_id'=>13,
        ]);
        // DB::table('usuario')->insert([
        //     'login' => 'area1',
        //     'password' => bcrypt('area1'),
        //     'tipousuario_id' => 3,
        //     'personal_id'=>4,
        // ]);
        // DB::table('usuario')->insert([
        //     'login' => 'area2',
        //     'password' => bcrypt('area2'),
        //     'tipousuario_id' => 3,
        //     'personal_id'=>3,
        // ]);
        // DB::table('usuario')->insert([
        //     'login' => 'area3',
        //     'password' => bcrypt('area3'),
        //     'tipousuario_id' => 3,
        //     'personal_id'=>2,
        // ]);
        // DB::table('usuario')->insert([
        //     'login' => 'area4',
        //     'password' => bcrypt('area4'),
        //     'tipousuario_id' => 3,
        //     'personal_id'=>1,
        // ]);
    }
}
