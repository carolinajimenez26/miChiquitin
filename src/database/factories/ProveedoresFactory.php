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
$factory->define(App\Models\Inventario\Proveedor::class, function (Faker\Generator $faker) {
    return [
        'id_tipo' => '0',
        'fecha' => $faker->dateTimeThisYear('-1 month'),
        'representante_legal' => $faker->name,
        'id_representante' => "$faker->randomDigitNotNull",
        'telefono' => $faker->phoneNumber,
        'razon_social' => '',
        'per_juv' => '',
        'departamento' => '',
        'direccion' => $faker->address,
        'ciudad' => ''
    ];
});
