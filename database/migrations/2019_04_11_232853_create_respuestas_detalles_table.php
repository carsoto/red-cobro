<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestasDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas_detalles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idrespuestas_detalles')->unsigned();
            $table->integer('respuestas_idrespuesta')->unsigned();
            $table->string('respuestas_codigo_respuesta', 10);
            $table->string('literal', 2);
            $table->string('detalle', 255);
            $table->enum('tipo_gestion', ['GESTIÓN VÁLIDA', 'GESTIÓN NO VÁLIDA']);
        
            $table->index('respuestas_idrespuesta','fk_respuestas_detalles_respuestas1_idx');
        
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
        Schema::dropIfExists('respuestas_detalles');
    }
}
