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
            $table->string('username', 45)->unique();
            $table->string('name', 191);
            $table->string('lastname', 191);
            $table->string('email', 191)->unique();
            $table->enum('status', ['Activo',  'Inactivo']);
            $table->time('email_verified_at')->nullable()->default(null);
            $table->string('password', 191);
            $table->string('remember_token', 100)->nullable()->default(null);
        
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
