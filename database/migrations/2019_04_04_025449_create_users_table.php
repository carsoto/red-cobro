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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcarteras')->unsigned()->nullable();
            $table->string('username', 45)->unique();
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->enum('status', ['Activo', 'Inactivo']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->index('idcarteras','cartera_idx');
        
            $table->foreign('idcarteras')
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
        Schema::dropIfExists('users');
    }
}
