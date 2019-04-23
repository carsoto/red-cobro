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
        $role_superadmin = Role::where('name', 'superadmin')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_supervisor = Role::where('name', 'supervisor')->first();
        $role_agente = Role::where('name', 'agente')->first();
        
        $user = new User();
        $user->name = 'Victor';
        $user->lastname = 'Fuentes';
        $user->username = '1234567-1';
        $user->email = 'superadmin@example.com';
        $user->password = bcrypt('12345');
        $user->status = 1;
        $user->creado_por = 1;
        $user->roles_id = $role_superadmin->id;
        $user->save();

        $user = new User();
        $user->name = 'Paola';
        $user->lastname = 'Pinero';
        $user->username = '1234567-2';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('12345');
        $user->status = 1;
        $user->creado_por = 1;
        $user->roles_id = $role_admin->id;
        $user->save();

        $user = new User();
        $user->name = 'Andrea';
        $user->lastname = 'Borges';
        $user->username = '1234567-3';
        $user->email = 'supervisor@example.com';
        $user->password = bcrypt('12345');
        $user->status = 1;
        $user->creado_por = 2;
        $user->roles_id = $role_supervisor->id;
        $user->save();

        $user = new User();
        $user->name = 'Carmen';
        $user->lastname = 'Soto';
        $user->username = '1234567-4';
        $user->email = 'agente@example.com';
        $user->password = bcrypt('12345');
        $user->status = 1;
        $user->creado_por = 2;
        $user->roles_id = $role_agente->id;
        $user->save();
    }
}

