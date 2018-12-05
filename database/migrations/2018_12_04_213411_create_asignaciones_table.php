<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaciones', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idasignaciones')->unsigned();
            $table->integer('deudores_iddeudores')->unsigned();
            $table->date('fecha_asignacion');
            $table->decimal('deuda', 9, 2);
        
            $table->index('deudores_iddeudores','fk_asignaciones_deudores_idx');
        
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
        Schema::dropIfExists('asignaciones');
    }
}
