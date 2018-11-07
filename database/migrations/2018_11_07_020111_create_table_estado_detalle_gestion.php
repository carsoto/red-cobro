<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEstadoDetalleGestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_detalle_gestion', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('iddetalle')->unsigned();
            $table->string('codigo', 10);
            $table->integer('idrespuesta')->unsigned();
            $table->integer('idliteral')->unsigned();
            $table->integer('idtipo')->unsigned();

            $table->index('idrespuesta','fk_detallegestion_respuesta_idx');
        
            $table->foreign('idrespuesta')
                ->references('idrespuesta')->on('respuesta_gestion');

            $table->index('idliteral','fk_detallegestion_literal_idx');
        
            $table->foreign('idliteral')
                ->references('idliteral')->on('literal_gestion');

            $table->index('idtipo','fk_detallegestion_tipo_idx');
        
            $table->foreign('idtipo')
                ->references('idtipo')->on('tipo_gestion');
        
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
        //
    }
}
