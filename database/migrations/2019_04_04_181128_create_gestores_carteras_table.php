<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestoresCarterasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestores_carteras', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idgestorescarteras')->unsigned();
            $table->integer('idgestores')->unsigned()->nullable();
            $table->integer('idcarteras')->unsigned()->nullable();
            $table->string('base', 100)->nullable()->default(null);
            $table->string('host_user', 45)->nullable()->default(null);
            $table->string('host_password', 45)->nullable()->default(null);
        
            $table->index('idcarteras','fk_gestores_carteras_carteras_idx');
            $table->index('idgestores','fk_gestores_carteras_gestores1_idx');
        
            $table->foreign('idcarteras')
                ->references('idcarteras')->on('carteras');
        
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
        Schema::dropIfExists('gestores_carteras');
    }
}
