<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('empresa_tipos')->delete();

        \DB::table('empresa_tipos')->insert([
            ['nombre' => 'Gran Empresa','nombrecorto' => 'A','factormaterial'=>'1.1','factormin'=>'2.20','pedidominimo'=>'17.00',],
            ['nombre' => 'Mediana Empresa','nombrecorto' => 'B','factormaterial'=>'1.2','factormin'=>'2.20','pedidominimo'=>'17.00'],
            ['nombre' => 'Pequeña Empresa','nombrecorto' => 'C','factormaterial'=>'1.3','factormin'=>'2.20','pedidominimo'=>'17.00'],
            ['nombre' => 'Mini Empresa','nombrecorto' => 'D','factormaterial'=>'1.4','factormin'=>'2.20','pedidominimo'=>'17.00',],
            ['nombre' => 'Micro Empresa','nombrecorto' => 'E','factormaterial'=>'1.5','factormin'=>'2.20','pedidominimo'=>'17.00',],
        ]);    }
}
