<?php

use Illuminate\Database\Seeder;

class CarterasTableSeeder extends Seeder
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
			array('idgestores' => 1, 'nombre' => 'Cartera1', 'status' => 1, 'created_at' => date('Y-m-d')),
			array('idgestores' => 1, 'nombre' => 'Cartera2', 'status' => 1, 'created_at' => date('Y-m-d')),
			array('idgestores' => 2, 'nombre' => 'Cartera3', 'status' => 1, 'created_at' => date('Y-m-d')),
			array('idgestores' => 2, 'nombre' => 'Cartera4', 'status' => 1, 'created_at' => date('Y-m-d')),
			array('idgestores' => 3, 'nombre' => 'Cartera5', 'status' => 1, 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
            \DB::table('carteras')->insert($records);
        }

    }
}
