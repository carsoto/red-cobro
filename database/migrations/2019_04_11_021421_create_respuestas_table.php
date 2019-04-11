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
            $table->integer('gestiones_idgestiones')->unsigned()->nullable();
            $table->string('codigo', 10);
            $table->string('respuesta', 255);
            $table->integer('contacto_directo')->nullable();
            $table->integer('contacto_indirecto')->nullable();
            $table->integer('sin_contacto')->nullable();
            $table->integer('status')->nullable();
            
            $table->index('gestiones_idgestiones','fk_respuestas_gestiones1_idx');
        
            $table->foreign('gestiones_idgestiones')
                ->references('idgestiones')->on('gestiones');
        
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
