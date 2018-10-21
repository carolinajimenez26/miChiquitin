<?php

use Illuminate\Database\Seeder;

class provedores extends Seeder
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
            DB::table("proveedores")->insert([ //,
                'id_tipo' => $faker->name,
                'fecha' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
                'representante_legal' => $faker->name,
                'id_representante' => $faker->unique()->randomDigitNotNull,
                'telefono' => $faker->phoneNumber,
                'razon_social' => $faker->name,
                'per_juv' => $faker->name,
                'departamento' => $faker->state,
                'direccion' => $faker->address,
                'ciudad' => $faker->city,
            ]);
        }

    }
}
