<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->insert([
            [
                'id' => '1',
                'name' => 'MÉDICO CARDIOLOGISTA PEDIATRA'
            ],

            [
                'id' => '2',
                'name' => 'MÉDICO COORDENADOR'
            ],

            [
                'id' => '3',
                'name' => 'MÉDICO DO TRABALHO'
            ],

            [
                'id' => '4',
                'name' => 'MÉDICO GRADUADO'
            ],

            [
                'id' => '5',
                'name' => 'MÉDICO HEMATOLOGISTA CLÍNICO'
            ],

            [
                'id' => '6',
                'name' => 'MÉDICO HEMATOLOGISTA PEDIATRA'
            ],

            [
                'id' => '7',
                'name' => 'MÉDICO INTENSIVISTA CLÍNICO'
            ],

            [
                'id' => '8',
                'name' => 'MÉDICO INTENSIVISTA PEDIATRA'
            ],

            [
                'id' => '9',
                'name' => 'MÉDICO ONCOLOGISTA PEDIATRA'
            ],

            [
                'id' => '10',
                'name' => 'MÉDICO PEDIATRA'
            ],

            [
                'id' => '11',
                'name' => 'MÉDICO PEDIATRA PLANTONISTA'
            ],

            [
                'id' => '12',
                'name' => 'MÉDICO PEDIATRA PRESCRITOR'
            ],

            [
                'id' => '13',
                'name' => 'MÉDICO PNEUMOLOGISTA'
            ],

            [
                'id' => '14',
                'name' => 'MÉDICO PRESCRITOR'
            ],

            [
                'id' => '15',
                'name' => 'MÉDICO TRAUMATO - ORTOPEDISTA'
            ],

            [
                'id' => '16',
                'name' => 'MÉDICO TRAUMATO - ORTOPEDISTA PEDIATRA'
            ],

            [
                'id' => '17',
                'name' => 'ASSISTENTE SOCIAL'
            ],

            [
                'id' => '18',
                'name' => 'CIRURGIÃO BUCO MAXILO'
            ],

            [
                'id' => '19',
                'name' => 'CIRURGIÃO DENTISTA'
            ],

            [
                'id' => '20',
                'name' => 'ENFERMEIRO'
            ],

            [
                'id' => '21',
                'name' => 'ENFERMEIRO INTENSIVISTA'
            ],

            [
                'id' => '22',
                'name' => 'FARMACÊUTICO'
            ],

            [
                'id' => '23',
                'name' => 'FARMACÊUTICO BIOQUÍMICO'
            ],

            [
                'id' => '24',
                'name' => 'FISIOTERAPEUTA'
            ],

            [
                'id' => '25',
                'name' => 'FONOAUDIOLOGO'
            ],

            [
                'id' => '26',
                'name' => 'NUTRICIONISTA'
            ],

            [
                'id' => '27',
                'name' => 'PSICÓLOGO'
            ],

            [
                'id' => '28',
                'name' => 'TERAPEUTA OCUPACIONAL'
            ],

            [
                'id' => '29',
                'name' => 'PESQUISADOR'
            ],

            [
                'id' => '30',
                'name' => 'ADMINISTRADOR DE BANCO DE DADOS'
            ],

            [
                'id' => '31',
                'name' => 'ADVOGADO'
            ],

            [
                'id' => '32',
                'name' => 'ANALISTA DE INFRAESTRUTURA'
            ],

            [
                'id' => '33',
                'name' => 'ANALISTA DE SEGURANÇA DA INFORMAÇÃO'
            ],

            [
                'id' => '34',
                'name' => 'ANALISTA DE SISTEMA'
            ],

            [
                'id' => '35',
                'name' => 'CONTADOR'
            ],

            [
                'id' => '36',
                'name' => 'COMUNICADOR SOCIAL'
            ],

            [
                'id' => '37',
                'name' => 'DESENVOLVEDOR DELPHI'
            ],

            [
                'id' => '38',
                'name' => 'DESENVOLVEDOR WEB BACK-END (PHP)'
            ],

            [
                'id' => '39',
                'name' => 'DESENVOLVEDOR WEB FRONT-END'
            ],

            [
                'id' => '40',
                'name' => 'ENGENHEIRO CLÍNICO'
            ],

            [
                'id' => '41',
                'name' => 'ENGENHEIRO AMBIENTAL'
            ],

            [
                'id' => '42',
                'name' => 'ENGENHEIRO SEGURANÇA DO TRABALHO'
            ],

            [
                'id' => '43',
                'name' => 'ESTATÍSTICO'
            ],

            [
                'id' => '44',
                'name' => 'PEDAGOGO'
            ],

            [
                'id' => '45',
                'name' => 'PUBLICITÁRIO'
            ],

            [
                'id' => '46',
                'name' => 'TÉCNICO'
            ],

            [
                'id' => '47',
                'name' => 'TÉCNICO DE ENFERMAGEM'
            ],

            [
                'id' => '48',
                'name' => 'TÉCNICO DE FARMÁCIA'
            ],

            [
                'id' => '49',
                'name' => 'TÉCNICO DE HEMOTERAPIA'
            ],

            [
                'id' => '50',
                'name' => 'TÉCNICO EM LABORATÓRIO'
            ],

            [
                'id' => '51',
                'name' => 'TÉCNICO EM NUTRIÇÃO'
            ],

            [
                'id' => '52',
                'name' => 'TÉCNICO DE PATOLOGIA'
            ],

            [
                'id' => '53',
                'name' => 'TÉCNICO EM SAÚDE BUCAL'
            ],

            [
                'id' => '54',
                'name' => 'ALMOXARIFE'
            ],

            [
                'id' => '55',
                'name' => 'ASSISTENTE ADMINISTRATIVO'
            ],

            [
                'id' => '56',
                'name' => 'TÉCNICO EM INFORMÁTICA'
            ],

            [
                'id' => '57',
                'name' => 'TÉCNICO EM SEGURANÇA DO TRABALHO'
            ],

            [
                'id' => '58',
                'name' => 'AGENTE DE PORTARIA'
            ],

            [
                'id' => '59',
                'name' => 'AUXILIAR DE SERVIÇOS GERAIS'
            ],

            [
                'id' => '60',
                'name' => 'MAQUEIRO'
            ],

            [
                'id' => '61',
                'name' => 'MOTORISTA'
            ],

            [
                'id' => '62',
                'name' => 'OPERADOR DE MANUTENÇÃO'
            ],

            [
                'id' => '63',
                'name' => 'RECEPCIONISTA'
            ],

            [
                'id' => '64',
                'name' => 'TELEFONISTA'
            ],

            [
                'id' => '65',
                'name' => 'VIGILANTE'
            ],

        ]);
    }
}
