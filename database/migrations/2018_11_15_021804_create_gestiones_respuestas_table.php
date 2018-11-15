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
            $table->integer('idgestiones')->unsigned();
            $table->integer('idrespuesta')->unsigned();
        
            $table->index('idrespuesta','fk_gestiones_respuestas_respuestas_idx');
            $table->index('idgestiones','fk_gestiones_respuestas_gestiones_idx');
        
            $table->foreign('idgestiones')
                ->references('idgestiones')->on('gestiones');
        
            $table->foreign('idrespuesta')
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
