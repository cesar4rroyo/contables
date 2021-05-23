<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('producto')->insert([
            'codigo' => 'PDT-0001',
            'preciounitario' => 1699.90,
            'descripcion' => 'Laptop Intel Celeron 128GB SSD 4GB',
            'marca' => 'Lenovo',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0002',
            'preciounitario' => 4099.90,
            'descripcion' => 'Laptop 14" AMD Ryzen 7 16GB 256GB IP5-15ARE05-R7',
            'marca' => 'Lenovo',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0003',
            'preciounitario' => 4399.90,
            'descripcion' => 'Laptop Gamer 3i Intel Core i5 10°Gen 1TB 16GB GTX 1650',
            'marca' => 'Lenovo',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0004',
            'preciounitario' => 2999.90,
            'descripcion' => 'Laptop Intel Core i5 10°Gen 512GB SSD 8GB',
            'marca' => 'Lenovo',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0005',
            'preciounitario' => 3699.90,
            'descripcion' => 'Laptop Core i7 10°Gen Iris Plus 256GB SSD 8GB',
            'marca' => 'Lenovo',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0006',
            'preciounitario' => 1599.90,
            'descripcion' => 'PC Intel Celeron G5900 3.4GHz, RAM 4GB, HDD 1TB, Wi-FI, BT, DVD, Windows 10 Home + Monitor HP V194',
            'marca' => 'HP',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0007',
            'preciounitario' => 3199.90,
            'descripcion' => 'PC Intel Core i5-10400 2.9GHz, RAM 8GB, HDD 1 TB + Sólido SSD 256GB PCIe, Wi-FI, BT, Windows 10 Home + Monitor HP P24V G4',
            'marca' => 'HP',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0008',
            'preciounitario' => 1699.90,
            'descripcion' => 'PC Intel Celeron J4025 2.0 GHz, RAM 4 GB, HDD 1TB SATA, Wi-FI, BT, Pantalla LED 20.7" Full HD',
            'marca' => 'HP',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0009',
            'preciounitario' => 3799.90,
            'descripcion' => 'PC Intel Core i5-8500 3.0GHz, RAM 8GB, Sólido SSD 256GB PCIe, DVD, Wi-FI, LED 23.8" Full HD Táctil, Windows 10 Pro',
            'marca' => 'Lenovo',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0010',
            'preciounitario' => 1999.90,
            'descripcion' => 'PC Intel Core i3-10110U 2.1 GHz, RAM 8GB, HDD 1TB, Wi-FI, BT, Pantalla LED 21.5" Full HD',
            'marca' => 'HP',
        ]);
        DB::table('producto')->insert([
            'codigo' => 'PDT-0011',
            'preciounitario' => '3199.00',
            'descripcion' => 'Laptop Aspire 3, Intel Core i5 - RAM 8GB - SSD 256GB',
            'marca' => 'ACER',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0012',
            'preciounitario' => '3999.00',
            'descripcion' => 'Laptop Aspire 3, Intel Core i7 - RAM 8GB - HDD 1TB y SSD 128GB',
            'marca' => 'ACER',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0013',
            'preciounitario' => '4199.00',
            'descripcion' => 'Laptop Nitro 5, Ryzen 5 - RAM 12GB - HDD 1TB',
            'marca' => 'ACER',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0014',
            'preciounitario' => '4299.00',
            'descripcion' => 'Laptop Ultrabook Swift 7, Intel Core i7 - RAM 8GB - SSD 512GB',
            'marca' => 'ACER',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0015',
            'preciounitario' => '4799.00',
            'descripcion' => 'Laptop Ultrabook Swift 3X, Intel Core i5 - RAM 8GB - SSD 512GB',
            'marca' => 'ACER',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0016',
            'preciounitario' => '2199.00',
            'descripcion' => 'Laptop AMD Ryzen 3 - RAM 4GB - SSD 128GB',
            'marca' => 'HP',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0017',
            'preciounitario' => '3099.00',
            'descripcion' => 'Laptop Intel Core i5 - RAM 12GB - HDD 1TB',
            'marca' => 'HP',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0018',
            'preciounitario' => '3299.00',
            'descripcion' => 'Laptop 250 G8, Intel Core i5 - RAM 8GB - HDD 1TB',
            'marca' => 'HP',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0019',
            'preciounitario' => '3799.00',
            'descripcion' => 'Laptop ProBook x360, Intel Core i5 - RAM 8GB - SSD 256GB',
            'marca' => 'HP',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0020',
            'preciounitario' => '4299.00',
            'descripcion' => 'Laptop Pavilion 15, Intel Core i7 - RAM 8GB y OPTANE 16GB - SSD 256GB',
            'marca' => 'HP',
        ]);
        DB::table('producto')->insert([
            'codigo' => 'PDT-0021',
            'preciounitario' => '299.00',
            'descripcion' => 'Monitor LCD 18.5 Pulgadas',
            'marca' => 'Viewsonic',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0022',
            'preciounitario' => '399.00',
            'descripcion' => 'Monitor E1916H 18 Pulgadas',
            'marca' => 'DELL',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0023',
            'preciounitario' => '429.00',
            'descripcion' => 'Monitor E2054-19.5 Pulgadas',
            'marca' => 'LENOVO',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0024',
            'preciounitario' => '479.00',
            'descripcion' => 'Monitor LED LS22F350FHLX-21.5 Pulgadas',
            'marca' => 'Samsung',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0025',
            'preciounitario' => '519.00',
            'descripcion' => 'Monitor E2216H-21.5 Pulgadas',
            'marca' => 'DELL',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0026',
            'preciounitario' => '579.00',
            'descripcion' => 'Monitor T2224d-21.5 Pulgadas',
            'marca' => 'LENOVO',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0027',
            'preciounitario' => '699.00',
            'descripcion' => 'Monitor E2417H-23.8 Pulgadas',
            'marca' => 'DELL',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0028',
            'preciounitario' => '749.00',
            'descripcion' => 'Monitor E2420H-23.8 Pulgadas',
            'marca' => 'DELL',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0029',
            'preciounitario' => '849.00',
            'descripcion' => 'Monitor P2417H-23.8 Pulgadas',
            'marca' => 'DELL',
        ]);
        
        DB::table('producto')->insert([
            'codigo' => 'PDT-0030',
            'preciounitario' => '999.00',
            'descripcion' => 'Monitor C27-20-27 Pulgadas',
            'marca' => 'LENOVO',
        ]);
        DB::table('producto')->insert([
            'codigo' => 'PDT-0031',
            'preciounitario' => '1500.00',
            'descripcion' =>'Sotfware Contable PLAYSOFT',
            'marca' => '',
        ]);
        DB::table('producto')->insert([
            'codigo' => 'PDT-0032',
            'preciounitario' => '4200.00',
            'descripcion' => 'Software ERP cloud',
            'marca' => '',
        ]);
    }
}
