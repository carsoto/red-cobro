<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudores', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('iddeudores')->unsigned();
            $table->integer('rut')->index();
            $table->string('rut_dv', 45);
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
        Schema::drop('deudores');

    }
}
