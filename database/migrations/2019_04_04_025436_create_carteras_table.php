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
        
            $table->increments('idcarteras');
            $table->integer('idgestores')->unsigned()->nullable();
            $table->string('nombre', 50)->nullable();
            $table->string('base', 100)->nullable();
            $table->string('host_user', 45)->nullable();
            $table->string('host_password', 45)->nullable();
        
            $table->index('idgestores','gestor_idx');
        
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
