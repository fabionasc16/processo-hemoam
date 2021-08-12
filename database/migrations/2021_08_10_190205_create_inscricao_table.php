<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscricaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('funcao_id')->unsigned();
            $table->bigInteger('cargo_id')->unsigned()->nullable();
            $table->bigInteger('candidato_id')->unsigned();

            $table->tinyInteger('pne')->comment('0-não 1-sim')->nullable();
            //$table->tinyInteger('ciente_pne')->comment('0-não 1-sim')->nullable();
            $table->string('tipo_deficiencia')->nullable();
            $table->string('cid_pne','100')->nullable();

            $table->string('caminho_laudomedico')->nullable();

            //superior
            $table->string('caminho_diploma_graduacao')->nullable();
            $table->string('caminho_registro_classe')->nullable();
            $table->string('caminho_quitacao_classe')->nullable();
            $table->string('caminho_certificado_pos')->nullable();
            $table->string('caminho_certificado_residmedica')->nullable();

            //medio tecnico
            $table->string('caminho_curso_medtec')->nullable();
            $table->string('caminho_registro_regional')->nullable();
            $table->string('caminho_quitacao_classeregional')->nullable();

            //medio
            $table->string('caminho_curso_medio')->nullable();

            //fundamental
            $table->string('caminho_curso_fundamental')->nullable();

            $table->tinyInteger('statusinscricao')->comment('1-concluida 2-rascunho 3-cancelada')
                ->default(2)->nullable();

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
        Schema::dropIfExists('inscricao');
    }
}
