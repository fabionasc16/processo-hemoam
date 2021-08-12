<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexos')->insert([
            [
                'name'=>'Masculino'
            ],
            
            [
                'name'=>'Feminino'
            ]
            ]);
    }
}
