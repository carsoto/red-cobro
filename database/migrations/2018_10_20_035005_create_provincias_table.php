<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idprovincias')->unsigned();
            $table->integer('idregion')->unsigned();
            $table->string('provincia', 45);
        
            $table->index('idregion','fk_provincias_regiones_idx');
        
            $table->foreign('idregion')
                ->references('idregion')->on('regiones');
        
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
        Schema::drop('provincias');

    }
}
