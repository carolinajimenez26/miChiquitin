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
use App\Models\Usuarios\Empleado;
use App\Models\Usuarios\Empresa;
use App\Models\Usuarios\Contrato;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Empleado::class, function (Faker\Generator $faker) {
    $usersIds = User::all()->pluck('id')->toArray();
    $empresasIds = Empresa::all()->pluck('id_empresa')->toArray();
    $contratosIds = Contrato::all()->pluck('id_contrato')->toArray();
    return [
        'id_usuario' => $faker->randomElement($usersIds),
        'id_empresa' => $faker->randomElement($empresasIds),
        'id_contrato' => $faker->randomElement($contratosIds),
        'estado' => '',
        'cargo' => $faker->randomElement($array = array ('vendedor','otro','otro2')),
        'area' => ''
    ];
});
