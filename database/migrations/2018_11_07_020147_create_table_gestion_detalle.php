<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGestionDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestion_detalle', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('iddetalle')->unsigned();
            $table->integer('idgestion')->unsigned();
            
            $table->index('iddetalle','fk_estadodetallegestion_idx');
        
            $table->foreign('iddetalle')
                ->references('iddetalle')->on('estado_detalle_gestion');

            $table->index('idgestion','fk_gestion_idx');
        
            $table->foreign('idgestion')
                ->references('idgestion')->on('gestion');

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
        Schema::drop('gestion_detalle');
    }
}
