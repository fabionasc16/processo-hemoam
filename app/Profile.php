<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $table = 'profiles';
    public $timestamps = true;

    protected $fillable =[

        'cpf',
        'nome',
        'nascimento',
        'estado_civil',
        'nacionalidade',
        'naturalidade',
        'rg',
        'orgao_emissor',
        'pis_pasep',
        'titulo_eleitor',
        'cert_reservista',
        'reg_conselho',
        'id_escolaridade',
        'sexo',
        'nome_mae',
        'nome_pai',
        'email',
        'telefone',
        'endereco',
        'cep',
        'cidade',
        'uf',
        'experiencia_1',
        'meses_1',
        'experiencia_2',
        'meses_2',
        'experiencia_3',
        'meses_3',
		// 'numero_inscricao',

    ];


    public function user(){
        return $this->belongsTo('App\User');
    }



}
