<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('proceso_id');
            $table->integer('estado')->default(1);
            $table->date('fecha');
            $table->longText('acta');
            $table->timestamps();
            
            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');
            
            $table->foreign('proceso_id')->references('id')->on('procesos')->onDelete('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citaciones');
    }
}
