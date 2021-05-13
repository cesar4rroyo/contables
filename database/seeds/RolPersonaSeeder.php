<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rolpersonal')->insert([  
            'personal_id'=>1,
            'rol_id'=>1
        ]);
        DB::table('rolpersonal')->insert([  
            'personal_id'=>1,
            'rol_id'=>2
        ]);
        DB::table('rolpersonal')->insert([  
            'personal_id'=>2,
            'rol_id'=>1
        ]);
        DB::table('rolpersonal')->insert([  
            'personal_id'=>2,
            'rol_id'=>2
        ]);
        DB::table('rolpersonal')->insert([  
            'personal_id'=>3,
            'rol_id'=>1
        ]);
        DB::table('rolpersonal')->insert([  
            'personal_id'=>3,
            'rol_id'=>2
        ]);
        DB::table('rolpersonal')->insert([  
            'personal_id'=>4,
            'rol_id'=>1
        ]);
        DB::table('rolpersonal')->insert([  
            'personal_id'=>4,
            'rol_id'=>2
        ]);
    }
}
