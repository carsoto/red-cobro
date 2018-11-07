<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLiteralGestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('literal_gestion', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idliteral')->unsigned();
            $table->string('letra', 1);
            $table->string('detalle', 255);
        
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
        Schema::drop('literal_gestion');
    }
}
