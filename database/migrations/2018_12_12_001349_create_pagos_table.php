<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idpagos')->unsigned();
            $table->string('rut', 45);
            $table->integer('documentos_iddocumentos')->unsigned();
            $table->decimal('monto', 9, 2);
            $table->date('fecha');
        
            $table->index('documentos_iddocumentos', 'fk_pagos_documentos_idx');
        
            $table->foreign('documentos_iddocumentos')
                ->references('iddocumentos')->on('documentos');
        
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
        Schema::dropIfExists('pagos');
    }
}
