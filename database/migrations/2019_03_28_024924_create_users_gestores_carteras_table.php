<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersGestoresCarterasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_gestores_carteras', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idusersgestorescarteras')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('gestores_idgestores')->unsigned();
            $table->integer('carteras_idcarteras')->unsigned();
        
            $table->index('users_id','fk_table1_users_idx');
            $table->index('gestores_idgestores','fk_table1_gestores1_idx');
            $table->index('carteras_idcarteras','fk_table1_carteras1_idx');
        
            $table->foreign('users_id')
                ->references('id')->on('users');
        
            $table->foreign('gestores_idgestores')
                ->references('idgestores')->on('gestores');
        
            $table->foreign('carteras_idcarteras')
                ->references('idcarteras')->on('carteras');
        
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
        Schema::dropIfExists('users_gestores_carteras');
    }
}
