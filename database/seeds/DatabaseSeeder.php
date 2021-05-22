<?php

use App\Models\Admin\Area;
use App\Models\Admin\Cargo;
use App\Models\Admin\TipoUsuario;
use App\Models\Control\Tarjetacontrol;
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
            'activo',
            'impuesto',
            'proveedor',
            'producto',
            'inventario',
            'asesoria',
            'carpetaempleado',
            'activoarea',
            'tarjetacontrol',
            //'compra'
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
        $this->call(ActivoSeeder::class);
        $this->call(ImpuestoSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(InventarioSeeder::class);
        $this->call(AsesoriaSeeder::class);
        $this->call(CarpetaEmpleadoSeeder::class);
        $this->call(ActivoAreaSeeder::class);
        $this->call(TarjetaControlSeeder::class);
        //$this->call(CompraSeeder::class);
        // $this->call(ProcedimientoSeeder::class);
        //$this->call(RolPersonaSeeder::class);
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
