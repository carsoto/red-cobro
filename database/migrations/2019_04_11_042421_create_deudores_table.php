<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudores', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            /*$table->increments('iddeudores')->unsigned();
            $table->integer('rut')->index();
            $table->string('rut_dv', 45);
            $table->string('razon_social', 150);
            $table->integer('en_gestion');

            $table->timestamps();*/

            $table->engine = 'InnoDB';
        
            $table->increments('iddeudores')->unsigned();
            $table->integer('carteras_idcarteras')->unsigned();
            $table->integer('users_id')->unsigned()->nullable();
            $table->integer('rut');
            $table->string('rut_dv', 45);
            $table->string('razon_social', 150)->nullable()->default(null);
            $table->integer('en_gestion')->nullable()->default(null);
            $table->integer('compromisos')->nullable()->default(null);
            $table->integer('contactos_directos')->nullable()->default(null);
            $table->integer('contactos_indirectos')->nullable()->default(null);
            $table->dateTime('fecha_asignacion')->nullable()->default(null);
            $table->dateTime('fecha_carga')->nullable()->default(null);
            $table->decimal('monto_asignacion', 9, 2)->nullable()->default(null);
            $table->string('ano_asignacion', 4)->nullable()->default(null);
            $table->string('mes_asignacion', 2)->nullable()->default(null);
        
            $table->index('rut','deudores_rut_index');
            $table->index('carteras_idcarteras','fk_deudores_carteras1_idx');
            $table->index('fecha_asignacion','fecha_asignacion');
            $table->index(['mes_asignacion', 'ano_asignacion'],'mes_ano');
            $table->index(['carteras_idcarteras', 'en_gestion'],'cartera_engestion');
            $table->index('users_id','fk_deudores_users1_idx');
        
            $table->foreign('carteras_idcarteras')
                ->references('idcarteras')->on('carteras');
        
            $table->foreign('users_id')
                ->references('id')->on('users');
        
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
        Schema::drop('deudores');

    }
}
