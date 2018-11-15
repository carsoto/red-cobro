<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestiones', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idgestiones')->unsigned();
            $table->string('codigo', 10);
            $table->string('descripcion', 255);
        
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
        Schema::drop('gestiones');

    }
}
