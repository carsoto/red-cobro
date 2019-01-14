<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestores', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idgestores')->unsigned();
            $table->integer('rut')->nullable()->index();
            $table->string('rut_dv', 45)->nullable();
            $table->string('razon_social', 150);
        
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
        Schema::drop('gestores');

    }
}