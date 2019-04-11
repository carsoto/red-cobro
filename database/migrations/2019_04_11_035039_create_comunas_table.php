<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunas', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idcomunas')->unsigned();
            $table->integer('idprovincias')->unsigned();
            $table->string('comuna', 45);
        
            $table->index('idprovincias','fk_comunas_provincias1_idx');
        
            $table->foreign('idprovincias')
                ->references('idprovincias')->on('provincias');
        
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
        Schema::drop('comunas');

    }
}
