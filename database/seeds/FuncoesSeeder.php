<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcoes')->insert([
            [
                'id' => '1',
                'name'=>'Profissionais de Nível Superior Médicos – UNIDADE MANAUS',
                'nivel_id'=>'1',
                'unidade_id'=>'1',
            ],

            [
                'id' => '2',
                'name'=>'Profissionais de Nível Superior Área Assistencial – UNIDADE MANAUS',
                'nivel_id'=>'1',
                'unidade_id'=>'1',
            ],

            [
                'id' => '3',
                'name'=>'Profissionais de Nível Superior Área Administrativa – UNIDADE MANAUS',
                'nivel_id'=>'1',
                'unidade_id'=>'1',
            ],

            [
                'id' => '4',
                'name'=>'Profissionais de Nível Médio Técnico Área Assistencial - UNIDADE MANAUS',
                'nivel_id'=>'2',
                'unidade_id'=>'1',
            ],


            [
                'id' => '5',
                'name'=>'Profissionais de Nível Médio Área Administrativa – UNIDADE MANAUS',
                'nivel_id'=>'3',
                'unidade_id'=>'1',
            ],

            [
                'id' => '6',
                'name'=>'Profissionais de Nível Médio Técnico Área Administrativa – UNIDADE MANAUS',
                'nivel_id'=>'2',
                'unidade_id'=>'1',
            ],

            [
                'id' => '7',
                'name'=>'Profissionais de Nível Fundamental – UNIDADE MANAUS',
                'nivel_id'=>'4',
                'unidade_id'=>'1',
            ],

            [
                'id' => '8',
                'name'=>'Profissionais de Nível Superior Médicos – UNIDADE COARI',
                'nivel_id'=>'1',
                'unidade_id'=>'2',
            ],

            [
                'id' => '9',
                'name'=>'Profissionais de Nível Superior Área Assistencial – UNIDADE COARI',
                'nivel_id'=>'1',
                'unidade_id'=>'2',
            ],

            [
                'id' => '10',
                'name'=>'Profissionais de Nível Médio Técnico Área Assistencial – UNIDADE COARI',
                'nivel_id'=>'2',
                'unidade_id'=>'2',
            ],

            [
                'id' => '11',
                'name'=>'Profissionais de Nível Fundamental – UNIDADE COARI',
                'nivel_id'=>'4',
                'unidade_id'=>'2',
            ],


        ]);
    }
}
