<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudoresDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudores_direcciones', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('iddeudores')->unsigned();
            $table->integer('iddirecciones')->unsigned();
            $table->integer('status')->default(1);
        
            $table->index('iddirecciones','fk_deudores_has_direcciones_direcciones1_idx');
            $table->index('iddeudores','fk_deudores_has_direcciones_deudores1_idx');
        
            $table->foreign('iddeudores')
                ->references('iddeudores')->on('deudores');
        
            $table->foreign('iddirecciones')
                ->references('iddirecciones')->on('direcciones');
        
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
        Schema::drop('deudores_direcciones');

    }
}
