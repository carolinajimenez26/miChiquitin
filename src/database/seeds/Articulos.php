<?php
use Illuminate\Database\Seeder;
class Articulos extends Seeder
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
            DB::table("articulos")->insert([ //,
            	'id' => $faker->unique()->randomDigitNotNull,
                'nombre' => $faker->word,
                'descripcion' => $faker->text($maxNbChars = 150) ,
                'precio_basico' => $faker->numberBetween($min = 1000, $max = 9000),
                'cantidad' => $faker->randomDigitNotNull,
                'id_proveedor' => '1',
                'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
            ]);
        }
    }
}
