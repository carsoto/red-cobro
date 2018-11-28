<?php

use Illuminate\Database\Seeder;

class TiposGestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	set_time_limit(0);

        $array_records = array (
        	array('descripcion' => 'CESTIÓN VÁLIDA', 'created_at' => date('Y-m-d')),
        	array('descripcion' => 'CESTIÓN NO VÁLIDA', 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 1000) as $records) {
              \DB::table('tipos_gestion')->insert($records);
        }


    }
}
