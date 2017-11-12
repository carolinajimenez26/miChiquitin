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

use App\Models\Usuarios\Empresa;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Empresa::class, function (Faker\Generator $faker) {
    return [
        'nombre' => '',
        'direccion' => ''
    ];
});
