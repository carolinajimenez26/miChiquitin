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

use App\Models\Usuarios\User;
use App\Models\Usuarios\Cliente;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Cliente::class, function (Faker\Generator $faker) {
    $usersIds = User::all()->pluck('id')->toArray();
    return [
        'id_usuario' => $faker->unique()->randomElement($usersIds),
        'genero' => $faker->randomElement($array = array ('masculino','femenino','otro')),
        'ciudad' => $faker->randomElement($array = array ('Pereira','Cartago','Cali', 'Bogota'))
    ];
});
