<?php

use App\Models\Control\Venta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComprobanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= Venta::count(); $i++) { 
            DB::table('comprobante')->insert([
                'numero' => 'F063-' . zero_fill($i,8),
                'fecha'=> Venta::find($i)->fechaenvio,
                'tipodocumento'=>'FACTURA',
                'total'=> Venta::find($i)->total,
                'venta_id'=>$i,
                'cliente_id'=>Venta::find($i)->cliente_id,
            ]);
        }
    }
}
