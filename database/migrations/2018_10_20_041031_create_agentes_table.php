<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agentes', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idagentes')->unsigned();
            $table->integer('idsupervisores')->unsigned();
            $table->string('rut', 45);
            $table->string('nombre', 45);
        
            $table->index('idsupervisores','fk_agentes_supervisores1_idx');
        
            $table->foreign('idsupervisores')
                ->references('idsupervisores')->on('supervisores');
        
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
        Schema::drop('agentes');

    }

}
