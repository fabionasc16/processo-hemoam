<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('rg');
            $table->string('orgao_emissor');
            $table->string('cpf');
            $table->string('sexo')->comment('M/F');
            $table->date('nascimento');
            $table->string('email');
            $table->string('estado_civil');
            $table->string('nacionalidade');
            $table->string('naturalidade');
            $table->string('pis_pasep')->nullable();
            $table->string('titulo_eleitor');
            $table->string('cert_reservista')->nullable();
            $table->string('reg_conselho');
            $table->integer('id_escolaridade');
            $table->string('nome_mae');
            $table->string('nome_pai');
            $table->string('telefone');
            $table->string('endereco');
            $table->string('cep');
            $table->string('cidade');
            $table->char('uf');
            $table->string('local_nascimento');
            $table->integer('id_funcao_cargo')->comment('O cargo para qual fez seu cadastro');
            $table->string('caminho_rg');
            $table->string('caminho_cpf');
            $table->string('caminho_titulo');
            $table->string('caminho_quitacao');
            $table->string('caminho_pis');
            $table->string('caminho_reservista')->nullable();
            $table->string('caminho_residencia');
            $table->string('caminho_certidao')->nullable();
            $table->string('caminho_escolaridade');
            $table->string('caminho_curso');
            $table->string('caminho_registro');
            $table->string('caminho_banco')->nullable();
            $table->string('experiencia_1')->nullable();
            $table->integer('meses_1')->nullable();
            $table->string('caminho_experiencia_1')->nullable();
            $table->string('experiencia_2')->nullable()->comment('experiencia acima de 100h');
            $table->integer('meses_2')->nullable();
            $table->string('caminho_experiencia_2')->nullable();
            $table->string('experiencia_3')->nullable()->comment('experiencia entre 60 e 99h');
            $table->integer('meses_3')->nullable();
            $table->string('caminho_experiencia_3')->nullable();
            $table->string('numero_inscricao')->nullable();
            $table->char('contratado')->nullable()->comment('indica se já estava na lista de contratados');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
