<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('roles_id')->unsigned();
            $table->integer('idgestores')->unsigned()->nullable();
            $table->string('username', 45)->unique();
            $table->string('name', 191);
            $table->string('lastname', 191);
            $table->string('email', 191)->unique();
            $table->integer('creado_por')->nullable();
            $table->integer('status')->nullable();
            $table->time('email_verified_at')->nullable()->default(null);
            $table->string('password', 191);
            $table->string('remember_token', 100)->nullable()->default(null);
            
            
            $table->index('idgestores','fk_users_gestores1_idx');
            $table->index('roles_id','fk_users_roles1_idx');
        
            $table->foreign('roles_id')
                ->references('id')->on('roles');

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
        Schema::dropIfExists('users');
    }
}
