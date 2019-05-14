<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('iddirecciones')->unsigned();
            $table->integer('idcomunas')->unsigned()->index()->nullable();
            $table->string('direccion', 255);
            $table->string('complemento', 255)->nullable()->default(null);
        
            $table->index('idcomunas','fk_direcciones_comunas1_idx');
        
            $table->foreign('idcomunas')
                ->references('idcomunas')->on('comunas');
        
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
        Schema::drop('direcciones');

    }

}
