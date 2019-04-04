<?php

use Illuminate\Database\Seeder;

class GestoresTableSeeder extends Seeder
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
			array('rut' => '9999-1', 'razon_social' => 'Gestor1', 'created_at' => date('Y-m-d')),
			array('rut' => '9999-2', 'razon_social' => 'Gestor2', 'created_at' => date('Y-m-d')),
			array('rut' => '9999-3', 'razon_social' => 'Gestor3', 'created_at' => date('Y-m-d')),
			array('rut' => '9999-4', 'razon_social' => 'Gestor4', 'created_at' => date('Y-m-d')),
			array('rut' => '9999-5', 'razon_social' => 'Gestor5', 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
            \DB::table('gestores')->insert($records);
        }

    }
}
