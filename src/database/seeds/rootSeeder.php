<?php

use Illuminate\Database\Seeder;

class rootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' 		=> 	'root',
        'email'		=>	'root@gmail.com',
        'password'	=>	bcrypt('321654'),
        'tipo_rol'	=>	'root',
        'apellidos'	=>	'root',
        'direccion'	=>	'Pereira',
        'edad'		=>	30,
        'credito_maximo' => 0.00,
        'credito_actual' => 0.00
      ]);
    }
}
