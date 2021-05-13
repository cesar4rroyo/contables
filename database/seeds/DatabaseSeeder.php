<?php

use App\Models\Admin\Area;
use App\Models\Admin\Cargo;
use App\Models\Admin\TipoUsuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
   
    public function run()
    {
        $this->truncateTablas([
            'cargo',
            'area',
            'rol',
            'grupomenu',
            'tipousuario',
            'opcionmenu',
            'personal',
            'usuario',
            'acceso',
            'empresacourier',
            'tipodocumento',
            // 'procedimiento',
            'rolpersonal',
            'tipotramitenodoc'
        ]);
        $this->call(CargoSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(GrupoMenuSeeder::class);
        $this->call(TipoUsuarioSeeder::class);
        $this->call(OpcionMenuSeeder::class);
        $this->call(PersonalSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(AccesoSeeder::class);
        $this->call(EmpresacourierSeeder::class);
        $this->call(TipodocumentoSeeder::class);
        // $this->call(ProcedimientoSeeder::class);
        $this->call(RolPersonaSeeder::class);
        $this->call(TipotramitenodocSeeder::class);
    }
    protected function truncateTablas(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
