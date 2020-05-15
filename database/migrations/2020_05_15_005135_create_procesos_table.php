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
            $table->longText('nombre_archivo');
            $table->unsignedInteger('p_autoridad_id');
            $table->unsignedInteger('p_demandante_id');
            $table->unsignedInteger('p_demandado_id');
            $table->string('nombre_archivo');
            $table->string('nombre_archivo');
            $table->longText('p_autoridad_id');
            $table->longText('seguimiento');

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
        Schema::dropIfExists('procesos');
    }
}
