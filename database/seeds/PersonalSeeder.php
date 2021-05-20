<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //empleados
        DB::table('personal')->insert([
            'nombres' => 'JHANCARLOS',
            'apellidopaterno' => 'BRAVO',
            'apellidomaterno' => 'PEÑA',
            'dni' => '73679627',
            'telefono' => '974165087',
            'email'=>'jhancarlos@unprg.edu',
            'direccion'=>'AV. LOS ANDES N°25 - MIRAFLORES - TUMÁN',
            'area_id'=>4,
            'cargo_id'=>1
        ]);
        DB::table('personal')->insert([
            'nombres' => 'DIEGO',
            'apellidopaterno' => 'VÁSQUEZ',
            'apellidomaterno' => 'ARAUJO',
            'dni' => '72845403',
            'telefono' => '983517083',
            'email'=>'dvasquezar@unprg.edu.pe',
            'area_id'=>3,
            'direccion'=>'POR LA GALLERA :v',
            'cargo_id'=>1

        ]);
        DB::table('personal')->insert([
            'nombres' => 'RENZO DAVID',
            'apellidopaterno' => 'TORRES',
            'apellidomaterno' => 'ACOSTA',
            'dni' => '73748713',
            'telefono' => '933566145',
            'email'=>'rtorresa@unprg.edu.pe',
            'direccion'=>'CALLE CAPAC YUPANQUI 971 - LA VICTORIA',
            'area_id'=>2,
            'cargo_id'=>1
        ]);
        DB::table('personal')->insert([
            'nombres' => 'CÉSAR DAVID',
            'apellidopaterno' => 'ARROYO',
            'apellidomaterno' => 'TORRES',
            'dni' => '71482136',
            'telefono' => '924734626',
            'email' => 'carroyot@unprg.edu.pe',
            'area_id'=>3,
            'direccion'=>'AV. ANTENOR ORREGO MZ.B LT. 10 - LA VICTORIA',
            'cargo_id'=>4
        ]);

        DB::table('personal')->insert([
            'nombres' => 'Admin',
            'apellidopaterno' => 'Admin',
            'apellidomaterno' => '',
            'dni' => '11111111',
            'telefono' => '999999999',
            'area_id'=>1,
            'cargo_id'=>1
        ]);

        DB::table('personal')->insert([
            'nombres' => 'JOSÉ REYNALDO',
            'apellidopaterno' => 'ZAFRA',
            'apellidomaterno' => 'VARGAS',
            'dni' => '71484638',
            'telefono' => '934466163',
            'email' => 'jzafrav@unprg.edu.pe',
            'area_id'=>1,
            'direccion'=>'CALLE INCANATO 464 - JOSÉ LEONARDO ORTIZ',
            'cargo_id'=>1,
        ]);
        //personas comunes
        DB::table('personal')->insert([
            'nombres' => 'CESAR AUGUSTO',
            'apellidopaterno' => 'GUZMAN',
            'apellidomaterno' => 'VALLE',
            'dni' => '21384335',
            'telefono' => '979663100',
            'email' => 'cguzmanv@unprg.edu.pe',
            'direccion'=>'AV. BALTA 432',
        ]);
        
        DB::table('personal')->insert([
            'nombres' => 'LUIS',
            'apellidopaterno' => 'OTAKE',
            'apellidomaterno' => 'OYAMA',
            'dni' => '27462846',
            'telefono' => '925385624',
            'email' => 'lotakeo@unprg.edu.pe',
            'direccion'=>'AV. MANUEL SEOANE 345',
        ]);
        
        DB::table('personal')->insert([
            'nombres' => 'ROBERTO CARLOS',
            'apellidopaterno' => 'ARTEAGA',
            'apellidomaterno' => 'LORA',
            'dni' => '45264835',
            'telefono' => '923364758',
            'email' => 'rartegal@unprg.edu.pe',
            'direccion'=>'AV. LOS INCAS 342',
        ]);
        
        DB::table('personal')->insert([
            'nombres' => 'ERNESTO KARLO',
            'apellidopaterno' => 'CELI',
            'apellidomaterno' => 'ARÉVALO',
            'dni' => '52374536',
            'telefono' => '915484537',
            'email' => 'ecelia@unprg.edu.pe',
            'direccion'=>'AV. SAENZ PEÑA 562',
        ]);
        
        DB::table('personal')->insert([
            'nombres' => 'ROSARIO',
            'apellidopaterno' => 'ARAUJO',
            'apellidomaterno' => 'MONTENEGRO',
            'dni' => '43724637',
            'telefono' => '912648365',
            'email' => 'raraujom@gmail.com',
            'direccion'=>'AV. INDEPENDENCIA 282',
        ]);
        
        DB::table('personal')->insert([
            'nombres' => 'PILAR DEL ROSARIO',
            'apellidopaterno' => 'RIOS',
            'apellidomaterno' => 'CAMPOS',
            'dni' => '73427145',
            'telefono' => '912648365',
            'email' => 'priosc@unprg.edu.pe',
            'direccion'=>'AV. CHINCHAYSUYO 246',
        ]);
        
        DB::table('personal')->insert([
            'nombres' => 'DANIEL',
            'apellidopaterno' => 'NUÑEZ',
            'apellidomaterno' => 'RODAS',
            'dni' => '72354735',
            'telefono' => '969508394',
            'email' => 'dnuñezr@unprg.edu.pe',
            'direccion'=>'AV. ANTENOR ORREGO 323',
        ]);
        
        DB::table('personal')->insert([
            'nombres' => 'JEAN CARLOS',
            'apellidopaterno' => 'RUBIO',
            'apellidomaterno' => 'ROJAS',
            'dni' => '73528456',
            'telefono' => '926710473',
            'email' => 'jrubior@unprg.edu.pe',
            'direccion'=>'AV. ANTENOR ORREGO 534',
        ]);
        
        DB::table('personal')->insert([
            'nombres' => 'GILBERTO MARTIN',
            'apellidopaterno' => 'AMPUERO',
            'apellidomaterno' => 'PASCO',
            'dni' => '25374559',
            'telefono' => '934423163',
            'email' => 'gampuerop@unprg.edu.pe',
            'direccion'=>'AV. WIRACOCHA 534',
        ]);
        
        DB::table('personal')->insert([
            'nombres' => 'LUIS ALBERTO',
            'apellidopaterno' => 'DAVILA',
            'apellidomaterno' => 'HURTADO',
            'dni' => '36278934',
            'telefono' => '925423163',
            'email' => 'ldavilah@unprg.edu.pe',
            'direccion'=>'AV. INTI RAYMI 231',
        ]);
        
        DB::table('personal')->insert([
            'nombres' => 'SANDRO RUBEN',
            'apellidopaterno' => 'BUSTAMANTE',
            'apellidomaterno' => 'VASQUEZ',
            'dni' => '71464632',
            'telefono' => '973702664',
            'email' => 'sbustamantev@unprg.edu.pe',
            'direccion'=>'AV. DORADO 463',
        ]);
        
        DB::table('personal')->insert([
            'nombres' => 'ARQUIMEDES',
            'apellidopaterno' => 'MUÑOZ',
            'apellidomaterno' => 'ZAMBRANO',
            'dni' => '14537245',
            'telefono' => '922314567',
            'email' => 'amuñozz@unprg.edu.pe',
            'direccion'=>'AV. LOS QUIPUS 132',
        ]);
        
        DB::table('personal')->insert([
            'nombres' => 'FABRIZIO ALVARO',
            'apellidopaterno' => 'RAMIREZ',
            'apellidomaterno' => 'MILIAN',
            'dni' => '72435373',
            'telefono' => '920650764',
            'email' => 'framirezm@unprg.edu.pe',
            'direccion'=>'AV. PEDRO RUIZ 421',
        ]);
        
        
        DB::table('personal')->insert([
            'nombres' => 'JONATHAN',
            'apellidopaterno' => 'SUCLUPE',
            'apellidomaterno' => 'SANTISTEBAN',
            'dni' => '79242513',
            'telefono' => '912757983',
            'email' => 'jsuclupes@unprg.edu.pe',
            'direccion'=>'AV. ANGAMOS 723',
        ]);
        
        DB::table('personal')->insert([
            'nombres' => 'KEIKO SOFIA',
            'apellidopaterno' => 'FUJIMORI',
            'apellidomaterno' => 'HIGUCHI',
            'dni' => '35223412',
            'telefono' => '911002546',
            'email' => 'kfujimorih@gmail.com',
            'direccion'=>'AV. GRAU 535',
        ]);
        //empresa
        DB::table('personal')->insert([
            'ruc' => '20189037651',
            'razonsocial' => 'PANADERIA ACOSTA',
            'telefono' => '987627298',
            'email' => 'panaderiaacosta@gmail.com',
            'representante' => 'RENZO TORRES ACOSTA',
            'direccion'=>'CALLE CAPAC YUPANQUI 971 - LA VICTORIA',
        ]);

        DB::table('personal')->insert([
            'ruc' => '20536557858',
            'razonsocial' => 'PROMART HOMECENTER',
            'telefono' => '98941236',
            'email' => 'promarthomecenter@gmail.com',
            'representante' => 'CARLOS ANIBAL AGURTO PAZ',
            'direccion'=>'AV.GRAL ARENALES 296 - CHICLAYO',
        ]);

        DB::table('personal')->insert([
            'ruc' => '20189037736',
            'razonsocial' => 'MARAKOS GRILL',
            'telefono' => '987627412',
            'email' => 'marakosgrill@gmail.com',
            'representante' => 'RIGOBERTO AÑASCO MERINO',
            'direccion'=>'AV. STA VICTORIA 470 - CHICLAYO',
        ]);

        DB::table('personal')->insert([
            'ruc' => '20689037216',
            'razonsocial' => 'DISTRIBUCIONES OLANO SAC',
            'telefono' => '984651237',
            'email' => 'olanosac@gmail.com',
            'representante' => 'MANUEL CIRILO ALEGRIA',
            'direccion'=>'AV. PEDRO RUIZ 754 - CHICLAYO',
        ]);

        DB::table('personal')->insert([
            'ruc' => '21589037146',
            'razonsocial' => 'HEBRON RESTAURANT & GRILL',
            'telefono' => '946157832',
            'email' => 'hebrongrill@gmail.com',
            'representante' => 'AFONSO ADRIAN MENDOZA TULLUME',
            'direccion'=>'AV BALTA 605, CHICLAYO - CHICLAYO',
        ]);

        DB::table('personal')->insert([
            'ruc' => '20189037444',
            'razonsocial' => 'KARL WEISS',
            'telefono' => '914672584',
            'email' => 'karlwiss@gmail.com',
            'representante' => 'JULIO GALVEZ MONTEZA',
            'direccion'=>'MARISCAL NIETO S/N - CHICLAYO',
        ]);

        DB::table('personal')->insert([
            'ruc' => '20945724615',
            'razonsocial' => 'COFFEE ART',
            'telefono' => '945781265',
            'email' => 'coffeeart@gmail.com',
            'representante' => 'RENZO HEIZEN VELASQUEZ',
            'direccion'=>'MANUEL MARÍA IZAGA 900 - CHICLAYO',
        ]);

        DB::table('personal')->insert([
            'ruc' => '20189037654',
            'razonsocial' => 'TAI LOY',
            'telefono' => '987627784',
            'email' => 'tailoy@gmail.com',
            'representante' => 'CARLOS HUAMAN CHUMACERO',
            'direccion'=>'AV. MANUEL PARDO 345 - CHICLAYO',
        ]);

        DB::table('personal')->insert([
            'ruc' => '20189037660',
            'razonsocial' => 'PIMP',
            'telefono' => '912465821',
            'email' => 'pimpperu@gmail.com',
            'representante' => 'JORGE CHAVEZ MOLINA',
            'direccion'=>'CALLE LOS FAIQUES 109 URB. STA VICTORIA - CHICLAYO',
        ]);

        DB::table('personal')->insert([
            'ruc' => '20189037674',
            'razonsocial' => 'LAPNOVA',
            'telefono' => '987627299',
            'email' => 'lapnova@gmail.com',
            'representante' => 'RICHARD TORRES GALVEZ',
            'direccion'=>'CALLE JUAN CUGLIEVAN 848 - CHICLAYO',
        ]);

        DB::table('personal')->insert([
            'ruc' => '20189037481',
            'razonsocial' => 'ARQUICOM',
            'telefono' => '999845142',
            'email' => 'arquicom@gmail.com',
            'representante' => 'ALEJANDRO ALCALDE ALAMO',
            'direccion'=>'CALLE ELIAS AGUIRRE 250 - CHICLAYO',
        ]);

        DB::table('personal')->insert([
            'ruc' => '20189037696',
            'razonsocial' => 'RAICES RESTAURANT',
            'telefono' => '987627290',
            'email' => 'raiceschiclayo@gmail.com',
            'representante' => 'RENZO MENDOZA MEJIA',
            'direccion'=>'LOS GUABOS 201 - CHICLAYO',
        ]);

        DB::table('personal')->insert([
            'ruc' => '20189037314',
            'razonsocial' => 'CHUMAY CHIFAS Y PARRILLAS',
            'telefono' => '946127845',
            'email' => 'chumaycix@gmail.com',
            'representante' => 'FIORELLA FERNANDEZ ROMERO',
            'direccion'=>'CALLE VALDIVIEZO 315 - CHICLAYO',
        ]);

        DB::table('personal')->insert([
            'ruc' => '20189037848',
            'razonsocial' => 'EL PUNTO DEL SABOR',
            'telefono' => '987627298',
            'email' => 'puntodelsabor@gmail.com',
            'representante' => 'XIOMARA ALMEIDA RODRIGUEZ',
            'direccion'=>'AV. BOLOGNESI 1145 - CHICLAYO',
        ]);

        DB::table('personal')->insert([
            'ruc' => '20189037465',
            'razonsocial' => 'PACIFICO RESTAURANT GOURMET',
            'telefono' => '987627299',
            'email' => 'pacificogourmet@gmail.com',
            'representante' => 'LARRY JOHNSON DEL CASTILLO',
            'direccion'=>'AV. HUAMACHUCO 970 - LAMBAYEQUE',
        ]);

        DB::table('personal')->insert([
            'ruc' => '20189037714',
            'razonsocial' => 'COLEGIO SAN AGUSTIN',
            'telefono' => '987627214',
            'email' => 'sanagustin@gmail.com',
            'representante' => 'JOSE MONTALVO ROJAS',
            'direccion'=>'KM. 8 CARRETERA PIMENTEL - PIMENTEL',
        ]);

        DB::table('personal')->insert([
            'ruc' => '20189037126',
            'razonsocial' => 'TIENDAS METRO',
            'telefono' => '987627241',
            'email' => 'tiendasmetrocix@gmail.com',
            'representante' => 'LAURA LORENA GONZALES CHAFLOQUE',
            'direccion'=>'ELIAS AGUIRRE 277 - CHICLAYO',
        ]);

        
    }
}



