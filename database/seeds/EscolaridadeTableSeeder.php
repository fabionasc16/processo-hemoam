<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscolaridadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escolaridades')->insert([
            [
                'name' => 'Fundamental - Incompleto'
            ],

            [
                'name' => 'Fundamental - Completo'
            ],

            [
                'name' => 'Médio - Incompleto'
            ],

            [
                'name' => 'Médio - Completo'
            ],

            [
                'name' => 'Superior - Incompleto'
            ],

            [
                'name' => 'Superior - Completo'
            ]

        ]);
    }
}
