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
            $table->string('codigo_gestion');
            $table->string('codigo_respuesta');
        
            $table->index('codigo_respuesta','fk_gestiones_respuestas_respuestas_idx');
            $table->index('codigo_gestiones','fk_gestiones_respuestas_gestiones_idx');
        
            $table->foreign('codigo_gestiones')
                ->references('codigo')->on('gestiones');
        
            $table->foreign('codigo_respuesta')
                ->references('codigo')->on('respuestas');
        
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
