<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoCivilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_civil')->insert([
            [
                'name' => 'Solteiro'
            ],

            [
                'name' => 'Casado'
            ],

            [
                'name' => 'União Estável'
            ],

            [
                'name' => 'Divorciado'
            ],

            [
                'name' => 'Viúvo'
            ]
        ]);
    }
}
