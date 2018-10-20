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
            $table->string('numero', 100);
            $table->string('folio', 100);
            $table->string('deuda', 45);
            $table->string('fecha_emision', 45);
            $table->string('fecha_vencimiento', 45);
        
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
