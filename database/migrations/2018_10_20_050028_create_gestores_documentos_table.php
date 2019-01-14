<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestoresDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestores_documentos', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('idgestores')->unsigned();
            $table->integer('iddocumentos')->unsigned();
            $table->integer('idestado_documentos')->unsigned()->nullable();
        
            $table->index('iddocumentos','fk_gestores_has_documentos_documentos1_idx');
            $table->index('idgestores','fk_gestores_has_documentos_gestores1_idx');
            $table->index('idestado_documentos','fk_gestores_documentos_estado_documentos1_idx');
        
            $table->foreign('idgestores')
                ->references('idgestores')->on('gestores');
        
            $table->foreign('iddocumentos')
                ->references('iddocumentos')->on('documentos');
        
            $table->foreign('idestado_documentos')
                ->references('idestado_documentos')->on('estado_documentos');
        
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
        Schema::drop('gestores_documentos');

    }
}
