<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntidadesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('entidades')->delete();

        \DB::table('entidades')->insert([
            // ['entidadtipo_id'=>'1','entidad'=>'Test','comercial_id'=>'1','nif'=>'xxxx','direccion'=>'c/Pi 1','localidad'=>'Barcelona','cp'=>'08000','tfno'=>'9999999','emailgral'=>'']
            ['entidadtipo_id'=>'1','entidad'=>'Test','nif'=>'xxxx','direccion'=>'c/Pi 1','localidad'=>'Barcelona','cp'=>'08000','tfno'=>'9999999','emailgral'=>'']
        ]);
    }
}
