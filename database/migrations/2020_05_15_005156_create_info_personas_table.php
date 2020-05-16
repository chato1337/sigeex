<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_personas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('municipio_nac_id');
            $table->unsignedBigInteger('depto_nac_id');
            $table->time('fecha_exped_doc');
            $table->unsignedBigInteger('municipio_exped_id');
            $table->unsignedBigInteger('depto_exped_id');

            $table->timestamps();

            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');
            $table->foreign('municipio_nac_id')->references('id')->on('municipalities')->onDelete('cascade');
            $table->foreign('depto_nac_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('municipio_exped_id')->references('id')->on('municipalities')->onDelete('cascade');
            $table->foreign('depto_exped_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_personas');
    }
}
