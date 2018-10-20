<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudoresCorreosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudores_correos', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('iddeudores')->unsigned();
            $table->integer('idcorreos_electronicos')->unsigned();
            $table->integer('activo')->default(1);
        
            $table->index('idcorreos_electronicos','fk_deudores_has_correos_correos1_idx');
            $table->index('iddeudores','fk_deudores_has_correos_deudores1_idx');
        
            $table->foreign('iddeudores')
                ->references('iddeudores')->on('deudores');
        
            $table->foreign('idcorreos_electronicos')
                ->references('idcorreos_electronicos')->on('correos');
        
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
        Schema::drop('deudores_correos');

    }
}
