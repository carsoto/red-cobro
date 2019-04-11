<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudoresGestionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudores_gestiones', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('iddeudoresgestiones')->unsigned();
            $table->integer('users_id')->unsigned()->nullable();
            $table->integer('carteras_idcarteras')->unsigned()->nullable();
            $table->integer('deudores_iddeudores')->unsigned()->nullable();
            $table->integer('gestiones_idgestiones')->unsigned()->nullable();
            $table->integer('respuestas_idrespuesta')->unsigned()->nullable();
            $table->integer('idrespuestas_detalles')->unsigned()->nullable();
            $table->integer('deudores_correos_id')->unsigned()->nullable();
            $table->integer('deudores_telefonos_id')->unsigned()->nullable();
            $table->dateTime('fecha')->nullable();
            $table->dateTime('fecha_futura')->nullable();
            $table->integer('idgestion_futura')->nullable();
            $table->binary('observacion')->nullable();
            $table->string('mes', 2)->nullable();
            $table->string('ano', 4)->nullable();
            $table->integer('contacto_directo')->nullable();
            $table->integer('contacto_indirecto')->nullable();
            $table->integer('sin_contacto')->nullable();

            $table->index('gestiones_idgestiones','fk_deudores_has_gestiones_gestiones1_idx');
            $table->index('deudores_iddeudores','fk_deudores_has_gestiones_deudores1_idx');
            $table->index('respuestas_idrespuesta','fk_deudores_gestiones_respuestas1_idx');
            $table->index('idrespuestas_detalles','fk_deudores_gestiones_respuestas_detalles1_idx');
            $table->index('deudores_correos_id','fk_deudores_gestiones_deudores_correos1_idx');
            $table->index('deudores_telefonos_id','fk_deudores_gestiones_deudores_telefonos1_idx');
            $table->index('users_id','fk_deudores_gestiones_users1_idx');
            $table->index('carteras_idcarteras','fk_deudores_gestiones_carteras1_idx');
            $table->index(['mes', 'ano'],'mes_ano');
        
            $table->foreign('deudores_iddeudores')
                ->references('iddeudores')->on('deudores');
        
            $table->foreign('gestiones_idgestiones')
                ->references('idgestiones')->on('gestiones');
        
            $table->foreign('respuestas_idrespuesta')
                ->references('idrespuesta')->on('respuestas');
        
            $table->foreign('idrespuestas_detalles')
                ->references('idrespuestas_detalles')->on('respuestas_detalles');
        
            $table->foreign('deudores_correos_id')
                ->references('id')->on('deudores_correos');
        
            $table->foreign('deudores_telefonos_id')
                ->references('id')->on('deudores_telefonos');
        
            $table->foreign('users_id')
                ->references('id')->on('users');
        
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
        Schema::dropIfExists('deudores_gestiones');

    }
}
