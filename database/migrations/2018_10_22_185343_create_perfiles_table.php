<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfiles', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->integer('idperfiles')->unsigned();
            $table->string('nombre', 191);
            $table->string('descripcion', 191);
            
            $table->primary('idperfiles');
        
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
        Schema::drop('perfiles');

    }
}
