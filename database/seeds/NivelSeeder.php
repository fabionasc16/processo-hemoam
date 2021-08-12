<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nivel')->insert([
            [
                'id' => '1',
                'name' => 'Superior'
            ],

            [
                'id' => '2',
                'name' => 'Médio-Técnico'
            ],

            [
                'id' => '3',
                'name' => 'Médio'
            ],

            [
                'id' => '4',
                'name' => 'Fundamental'
            ],


        ]);
    }
}
