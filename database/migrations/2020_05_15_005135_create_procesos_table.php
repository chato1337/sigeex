<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->integer('codigo');
            $table->integer('estado');
            $table->unsignedBigInteger('tipologia_id');
            $table->string('desc_corta');
            $table->longText('descripcion');
            $table->unsignedBigInteger('p_autoridad_id');
            $table->unsignedBigInteger('p_demandante_id');
            $table->unsignedBigInteger('p_demandado_id');
            $table->longText('acuerdo');
            $table->longText('seguimiento');

            $table->timestamps();

            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');
            $table->foreign('tipologia_id')->references('id')->on('tipologias')->onDelete('cascade');
            $table->foreign('p_autoridad_id')->references('id')->on('autoridades')->onDelete('cascade');
            $table->foreign('p_demandante_id')->references('id')->on('personas')->onDelete('cascade');
            $table->foreign('p_demandado_id')->references('id')->on('personas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procesos');
    }
}
