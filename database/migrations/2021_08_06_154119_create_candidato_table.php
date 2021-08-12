<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidato', function (Blueprint $table) {
            $table->bigIncrements('id');
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
           /* $table->string('pis_pasep')->nullable();
            $table->string('titulo_eleitor');
            $table->string('cert_reservista')->nullable();
            $table->string('reg_conselho');*/
            $table->integer('id_escolaridade');
            $table->string('nome_mae');
            $table->string('nome_pai');
            $table->string('telefone');
            $table->string('endereco');
            $table->string('cep');
            $table->string('cidade');
            $table->char('uf');
            $table->string('local_nascimento');
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
        Schema::dropIfExists('candidato');
    }
}
