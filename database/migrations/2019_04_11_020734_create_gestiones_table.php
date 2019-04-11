<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestiones', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idgestiones')->unsigned();
            $table->integer('carteras_idcarteras')->unsigned()->nullable();
            $table->string('codigo', 10);
            $table->string('descripcion', 255);
            $table->integer('contacto_directo')->nullable();
            $table->integer('contacto_indirecto')->nullable();
            $table->integer('sin_contacto')->nullable();
            $table->integer('status')->nullable();
        
            $table->index('carteras_idcarteras','fk_gestiones_carteras1_idx');
        
            $table->foreign('carteras_idcarteras')
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
        Schema::drop('gestiones');

    }
}
