<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncoesCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcao_cargo', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('funcao_id')->unsigned();
            $table->foreign('funcao_id')
                ->references('id')
                ->on('funcoes');

            $table->bigInteger('cargo_id')->unsigned();
            $table->foreign('cargo_id')
                ->references('id')
                ->on('cargos');

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
        Schema::dropIfExists('funcao_cargo');
    }
}
