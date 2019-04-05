<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestoresCarterasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestores_carteras_users', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idgestores_carteras_users')->unsigned();
            $table->integer('idgestores')->unsigned()->nullable();
            $table->integer('idcarteras')->unsigned()->nullable();
            $table->integer('users_id')->unsigned()->nullable();
        
            $table->index('idcarteras','fk_gestores_carteras_users_carteras_idx');
            $table->index('users_id','fk_gestores_carteras_users_users1_idx');
            $table->index('idgestores','fk_gestores_carteras_users_gestores1_idx');
        
            $table->foreign('idcarteras')
                ->references('idcarteras')->on('carteras');
        
            $table->foreign('users_id')
                ->references('id')->on('users');
        
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
        Schema::dropIfExists('gestores_carteras_users');
    }
}
