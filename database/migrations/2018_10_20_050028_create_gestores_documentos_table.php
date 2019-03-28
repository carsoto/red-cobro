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
            $table->integer('deudores_iddeudores')->unsigned();
            $table->integer('iddocumentos')->unsigned();
        
            $table->index('iddocumentos','fk_gestores_has_documentos_documentos1_idx');
            $table->index('idgestores','fk_gestores_has_documentos_gestores1_idx');
            $table->index('deudores_iddeudores','fk_gestores_documentos_deudores1_idx');
        
            $table->foreign('iddocumentos')
                ->references('iddocumentos')->on('documentos');
        
            $table->foreign('idgestores')
                ->references('idgestores')->on('gestores');
        
            $table->foreign('deudores_iddeudores')
                ->references('iddeudores')->on('deudores');
        
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
