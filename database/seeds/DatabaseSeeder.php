<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GestoresTableSeeder::class);
        $this->call(CarterasTableSeeder::class);

        // La creación de datos de roles debe ejecutarse primero
        $this->call(RoleTableSeeder::class);

        // Los usuarios necesitarán los roles previamente generados
        $this->call(UserTableSeeder::class);

        /*$this->call(GestionesTableSeeder::class);
        $this->call(RespuestasTableSeeder::class);
        $this->call(GestionesRespuestasTableSeeder::class);
        $this->call(TiposGestionTableSeeder::class);
        $this->call(RespuestaDetallesTableSeeder::class);*/
    }
}
