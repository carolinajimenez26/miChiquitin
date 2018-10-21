<?php

use Illuminate\Database\Seeder;

class usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 3;

        for ($i = 0; $i < $limit; $i++) {
            DB::table("users")->insert([ //,
            	'id_tipo' => '1',
                'tipo_rol' => 'vendedor',
                'name' => $faker->firstNameMale,
                'apellidos' => $faker->lastName,
                'direccion' => $faker->address, 
                'email' => $faker-> freeEmail,
                'password' => bcrypt('321654'),
                'edad' => $faker->numberBetween($min = 18, $max = 70),
                'credito_maximo' => $faker->numberBetween($min = 1000, $max = 2000),
                'credito_actual' => $faker->numberBetween($min = 1000, $max = 2000),
            ]);
        }
    }
}
