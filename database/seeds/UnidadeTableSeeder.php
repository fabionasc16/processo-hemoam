<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades')->insert([
            [
                'id' => '1',
                'name'=>'Hospital do Sangue - Sede em Manaus'
            ],

            [
                'id' => '2',
                'name'=>'Hospital do Sangue - Hemonúcleo no Município de Coari'
            ]
        ]);
    }
}
