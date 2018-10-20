<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudoresDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudores_documentos', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id');
            $table->integer('iddeudores')->unsigned();
            $table->integer('iddocumentos')->unsigned();
            $table->integer('dias_mora')->nullable();
            $table->integer('idestado_documentos')->unsigned();
        
            $table->index('iddocumentos','fk_deudores_has_documentos_documentos1_idx');
            $table->index('iddeudores','fk_deudores_has_documentos_deudores1_idx');
            $table->index('idestado_documentos','fk_deudores_documentos_estado_documentos1_idx');
        
            $table->foreign('iddeudores')
                ->references('iddeudores')->on('deudores');
        
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
        Schema::drop('deudores_documentos');

    }
}
