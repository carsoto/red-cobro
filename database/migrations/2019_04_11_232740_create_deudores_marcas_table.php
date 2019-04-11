<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudoresMarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudores_marcas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('iddeudores')->unsigned();
            $table->integer('idmarcas')->unsigned();
            $table->integer('activo')->default(1);
        
            $table->index('idmarcas','fk_deudores_has_marcas_marcas1_idx');
            $table->index('iddeudores','fk_deudores_has_marcas_deudores1_idx');
        
            $table->foreign('iddeudores')
                ->references('iddeudores')->on('deudores');
        
            $table->foreign('idmarcas')
                ->references('idmarcas')->on('marcas');
        
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
        Schema::dropIfExists('deudores_marcas');
    }
}
