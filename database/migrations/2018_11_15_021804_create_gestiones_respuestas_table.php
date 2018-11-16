<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestionesRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('gestiones_respuestas', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->increments('idgestiones_respuestas')->unsigned();
		    $table->integer('gestiones_idgestiones')->unsigned();
		    $table->integer('respuestas_idrespuesta')->unsigned();
		
		    $table->index('respuestas_idrespuesta','fk_gestiones_has_respuestas_respuestas1_idx');
		    $table->index('gestiones_idgestiones','fk_gestiones_has_respuestas_gestiones1_idx');
		
		    $table->foreign('gestiones_idgestiones')
		        ->references('idgestiones')->on('gestiones');
		
		    $table->foreign('respuestas_idrespuesta')
		        ->references('idrespuesta')->on('respuestas');
		
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
        Schema::drop('gestiones_respuestas');

    }
}
