<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('empleados', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idempleados')->unsigned();
            $table->integer('idgestores')->unsigned();
            $table->integer('rut')->index();
            $table->string('rut_dv', 45);
            $table->string('nombre', 45);
            $table->integer('idpadre')->unsigned();
        
            $table->index('idgestores','fk_supervisores_gestores1_idx');
        
            $table->foreign('idgestores')
                ->references('idgestores')->on('gestores');
        
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
        Schema::drop('empleados');

    }
}
