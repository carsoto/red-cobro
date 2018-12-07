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
        Schema::create('deudores_marcas', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('iddeudores_marcas')->unsigned();
            $table->integer('deudores_iddeudores')->unsigned();
            $table->string('marca', 255);
            $table->date('fecha_marca');
            $table->integer('activo')->default(1);
        
            $table->index('deudores_iddeudores','fk_deudores_marcas_deudores_idx');
        
            $table->foreign('deudores_iddeudores')
                ->references('iddeudores')->on('deudores');
        
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
