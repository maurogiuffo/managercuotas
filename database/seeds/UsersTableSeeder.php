<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//factory(App\User::class,29)->create();
		
		App\User::create([
			'name' => 'Mauro Giuffo',
            'email' => 'maurogiuffo@gmail.com',
            'role'=> 'SUPERADMIN',
            'password' => bcrypt('Aa123456'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
		]);

        App\User::create([
			'name' => 'admin',
            'email' => 'admin@servicios.com',
            'role'=> 'ADMIN',
            'password' => bcrypt('Admin1234'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
		]);

         App\User::create([
            'name' => 'administrador',
            'email' => 'administrador2020@seguridad.com',
            'role'=> 'ADMIN',
            'password' => bcrypt('mlrivadavia2020'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

         App\User::create([
            'name' => 'servicios1',
            'email' => 'servicios1@seguridad.com',
            'role'=> 'NORMAL',
            'password' => bcrypt('0883'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        App\User::create([
            'name' => 'servicios2',
            'email' => 'servicios2@seguridad.com',
            'role'=> 'NORMAL',
            'password' => bcrypt('9883'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        App\User::create([
			'name' => 'usuario',
            'email' => 'usuario@servicios.com',
            'role'=> 'NORMAL',
			'password' => bcrypt('Usuario1234'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
		]);

        //
    }
}
