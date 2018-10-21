<?php

use Illuminate\Database\Seeder;

class adminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' 		=> 	'admin',
        'email'		=>	'admin@gmail.com',
        'password'	=>	bcrypt('admin1234'),
        'tipo_rol'	=>	'admin',
        'apellidos'	=>	'admin',
        'direccion'	=>	'Pereira',
        'edad'		=>	30,
        'credito_maximo' => 0.00,
        'credito_actual' => 0.00
      ]);
    }
}
