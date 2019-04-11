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
            $table->integer('carteras_idcarteras')->unsigned()->nullable();
            $table->integer('documentos_iddocumentos')->unsigned();
            $table->string('rut', 45);
            $table->string('documento', 45);
            $table->date('fecha');
            $table->decimal('monto', 9, 2);
        
            $table->index('documentos_iddocumentos','fk_pagos_documentos_idx');
            $table->index('fecha','pagos_fecha_index');
            $table->index('carteras_idcarteras','fk_pagos_carteras1_idx');
        
            $table->foreign('documentos_iddocumentos')
                ->references('iddocumentos')->on('documentos');
        
            $table->foreign('carteras_idcarteras')
                ->references('idcarteras')->on('carteras');
        
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
