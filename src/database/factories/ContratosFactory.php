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

use App\Models\Usuarios\Contrato;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Contrato::class, function (Faker\Generator $faker) {
    return [
        'tipo' => '',
        'salario' => $faker->randomElement($array = array (100000,200000,500000)),
        'fecha_inicial' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'fecha_fin' => $faker->dateTimeThisMonth($max = 'now', $timezone = null)
    ];
});
