<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('iddocumentos')->unsigned();
            $table->integer('deudores_iddeudores')->unsigned();
            $table->integer('carteras_idcarteras')->unsigned();
            $table->string('numero', 100);
            $table->string('folio', 100)->nullable()->default(null);
            $table->decimal('deuda', 9, 2);
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento');
            $table->integer('dias_mora')->nullable()->default(null);
            $table->integer('activo')->nullable()->default('1');
        
            $table->index('deudores_iddeudores','fk_documentos_deudores1_idx');
            $table->index('fecha_emision','fecha_emision');
            $table->index('fecha_vencimiento','fecha_vencimiento');
            $table->index('carteras_idcarteras','fk_documentos_carteras1_idx');
        
            $table->foreign('deudores_iddeudores')
                ->references('iddeudores')->on('deudores');
        
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
        Schema::drop('documentos');

    }
}
