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
            $table->integer('idproveedores')->unsigned();
            $table->integer('idperfiles')->unsigned();
            $table->integer('rut')->index();
            $table->string('rut_dv', 45);
            $table->string('nombre', 45);
            $table->integer('idpadre')->unsigned();
        
            $table->index('idproveedores','fk_supervisores_proveedores1_idx');
            $table->index('idperfiles','fk_empleados_perfiles1_idx');
        
            $table->foreign('idproveedores')
                ->references('idproveedores')->on('proveedores');
        
            $table->foreign('idperfiles')
                ->references('idperfiles')->on('perfiles');
        
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
