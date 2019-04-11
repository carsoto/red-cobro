<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarterasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carteras', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idcarteras')->unsigned();
            $table->integer('idgestores')->unsigned()->nullable();
            $table->string('nombre', 45);
            $table->integer('status');
            
            $table->index('idgestores','fk_gestores_carteras_gestores1_idx');
            
            $table->foreign('idgestores')
                ->references('idgestores')->on('gestores');
        
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
        Schema::dropIfExists('carteras');
    }
}
