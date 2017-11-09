<?php

use Illuminate\Database\Seeder;

class Proveedores extends Seeder
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
          DB::table('proveedores')->insert([ //,
              'id_tipo' => 'aaa',
              'fecha' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = date_default_timezone_get()),
              'representante_legal' => $faker->name,
              'id_representante' => 'representante',
              'telefono' => $faker->e164PhoneNumber,
              'razon_social'=>'razon social',
              'per_juv'=> 'Per juv',
              'departamento'=>$faker->state,
              'direccion'=>$faker->streetAddress,
              'ciudad'=>$faker->city,
          ]);
      }
    }
}
