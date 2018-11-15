<?php

use Illuminate\Database\Seeder;

class GestionesRespuestasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        set_time_limit(0);

        $array_records = array ();

        foreach (array_chunk($array_records, 1000) as $records) {
              \DB::table('gestiones_respuestas')->insert($records);
        }
    }
}
