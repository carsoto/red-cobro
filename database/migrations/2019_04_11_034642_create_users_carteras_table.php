<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersCarterasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_carteras', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('iduserscarteras')->unsigned();
            $table->integer('users_id')->unsigned()->nullable();
            $table->integer('carteras_idcarteras')->unsigned()->nullable();
            $table->integer('status')->nullable();
        
            $table->index('carteras_idcarteras','fk_users_has_carteras_carteras1_idx');
            $table->index('users_id','fk_users_has_carteras_users1_idx');
        
            $table->foreign('users_id')
                ->references('id')->on('users');
        
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
        Schema::dropIfExists('users_carteras');
    }
}
