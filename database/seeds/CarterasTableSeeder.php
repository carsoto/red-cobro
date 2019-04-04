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
			array('nombre' => 'Cartera1', 'created_at' => date('Y-m-d')),
			array('nombre' => 'Cartera2', 'created_at' => date('Y-m-d')),
			array('nombre' => 'Cartera3', 'created_at' => date('Y-m-d')),
			array('nombre' => 'Cartera4', 'created_at' => date('Y-m-d')),
			array('nombre' => 'Cartera5', 'created_at' => date('Y-m-d')),
        );

        foreach (array_chunk($array_records, 100) as $records) {
            \DB::table('carteras')->insert($records);
        }

    }
}
