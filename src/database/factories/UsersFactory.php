<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Usuarios\User::class, function (Faker\Generator $faker) {
    $cred_max = $faker->numberBetween($min = 50000, $max = 100000);

    return [
        'name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('321654'),
        'remember_token' => str_random(10),
        'id_tipo' => $faker->unique()->numberBetween($min = 11, $max = 1000),
        'tipo_rol' => '',
        'apellidos' => $faker->lastName,
        'direccion' => $faker->address,
        'edad' => $faker->numberBetween($min = 1, $max = 110),
        'credito_maximo' => $cred_max,
        'credito_actual' => $faker->numberBetween($min = 0, $max = $cred_max)
    ];
});
