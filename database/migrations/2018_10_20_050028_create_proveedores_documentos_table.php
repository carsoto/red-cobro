<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores_documentos', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('idproveedores')->unsigned();
            $table->integer('iddocumentos')->unsigned();
            $table->integer('idestado_documentos')->unsigned();
        
            $table->index('iddocumentos','fk_proveedores_has_documentos_documentos1_idx');
            $table->index('idproveedores','fk_proveedores_has_documentos_proveedores1_idx');
            $table->index('idestado_documentos','fk_proveedores_documentos_estado_documentos1_idx');
        
            $table->foreign('idproveedores')
                ->references('idproveedores')->on('proveedores');
        
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
        Schema::drop('proveedores_documentos');

    }
}
