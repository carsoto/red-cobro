<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudoresGestionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudores_gestiones', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('iddeudores_gestiones')->unsigned();
            $table->integer('deudores_iddeudores')->unsigned();
            $table->string('contacto', 45)->nullable();
            $table->integer('gestiones_idgestiones')->unsigned();
            $table->string('respuesta', 150)->nullable();
            $table->string('detalle', 150)->nullable();
            $table->string('observacion', 350)->nullable();
            $table->integer('anyo');
            $table->integer('mes');
            $table->date('fecha_gestion')->nullable();
        
            $table->index('deudores_iddeudores','fk_deudores_gestiones_deudores_idx');
            $table->index('gestiones_idgestiones','fk_deudores_gestiones_gestiones1_idx');
        
            $table->foreign('deudores_iddeudores')
                ->references('iddeudores')->on('deudores');
        
            $table->foreign('gestiones_idgestiones')
                ->references('idgestiones')->on('gestiones');
        
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
        Schema::dropIfExists('deudores_gestiones');

    }
}
