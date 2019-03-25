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
            $table->string('folio', 100)->nullable();
            $table->decimal('deuda', 9, 2);
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento');
            $table->integer('dias_mora')->nullable();
        
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
