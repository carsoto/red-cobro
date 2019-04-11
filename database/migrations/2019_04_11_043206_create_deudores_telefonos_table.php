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
            $table->integer('iddeudores')->unsigned();
            $table->integer('idtelefonos')->unsigned();
            $table->integer('status')->default(1);
        
            $table->index('idtelefonos','fk_deudores_has_telefonos_telefonos1_idx');
            $table->index('iddeudores','fk_deudores_has_telefonos_deudores1_idx');
        
            $table->foreign('iddeudores')
                ->references('iddeudores')->on('deudores');
        
            $table->foreign('idtelefonos')
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
