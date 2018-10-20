<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisores', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idsupervisores')->unsigned();
            $table->integer('idproveedores')->unsigned();
            $table->string('rut', 45);
            $table->string('nombre', 45);
        
            $table->index('idproveedores','fk_supervisores_proveedores1_idx');
        
            $table->foreign('idproveedores')
                ->references('idproveedores')->on('proveedores');
        
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
        Schema::drop('supervisores');

    }
}
