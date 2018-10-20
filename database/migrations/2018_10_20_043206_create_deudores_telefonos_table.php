<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudoresTelefonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudores_telefonos', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('deudores_iddeudores')->unsigned();
            $table->integer('telefonos_idtelefonos')->unsigned();
            $table->integer('activo')->default(1);
        
            $table->index('telefonos_idtelefonos','fk_deudores_has_telefonos_telefonos1_idx');
            $table->index('deudores_iddeudores','fk_deudores_has_telefonos_deudores1_idx');
        
            $table->foreign('deudores_iddeudores')
                ->references('iddeudores')->on('deudores');
        
            $table->foreign('telefonos_idtelefonos')
                ->references('idtelefonos')->on('telefonos');
        
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
        Schema::drop('deudores_telefonos');

    }
}
