<?php

use Illuminate\Database\Seeder;
use DB;

class TipoGestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('tipo_gestion')->insert(
	    	array('descripcion' => 'Gestión válida'),
	    	array('descripcion' => 'Gestión no válida'),
	    );
    }
}
