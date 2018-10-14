<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $role_admin = Role::where('name', 'admin')->first();
        $role_supervisor = Role::where('name', 'supervisor')->first();
        $role_agente = Role::where('name', 'agente')->first();
		
		$user = new User();
        $user->name = 'Victor';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('12345');
        $user->status = 'Activo';
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Andrea';
        $user->email = 'supervisor@example.com';
        $user->password = bcrypt('12345');
        $user->status = 'Activo';
        $user->save();
        $user->roles()->attach($role_supervisor);

        $user = new User();
        $user->name = 'Carmen';
        $user->email = 'agente@example.com';
        $user->password = bcrypt('12345');
        $user->status = 'Activo';
        $user->save();
        $user->roles()->attach($role_agente);
    }
}
