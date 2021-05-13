<?php

use App\Models\Admin\OpcionMenu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numero_opcionesmenu = OpcionMenu::count();
        for ($i = 1; $i <= $numero_opcionesmenu; $i++) {
            DB::table('acceso')->insert([
                'tipousuario_id' => 1,
                'opcionmenu_id' => $i,
            ]);
        }
        for ($i = 1; $i <= 13; $i++) {
            DB::table('acceso')->insert([
                'tipousuario_id' => 3,
                'opcionmenu_id' => $i,
            ]);
        }
    }
}
