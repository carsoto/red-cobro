<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idrespuesta')->unsigned();
            $table->string('codigo', 10);
            $table->string('respuesta', 255);
            $table->string('detalle', 2);
            $table->string('descripcion', 255);
            $table->string('gestion', 45);
        
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
        Schema::drop('respuestas');

    }
}
