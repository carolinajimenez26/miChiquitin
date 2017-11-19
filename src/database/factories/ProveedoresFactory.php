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

    $tipos_persona_juridica = ['Derecho publico', 'Derecho privado'];

    return [
        'id_tipo' => $faker->unique()->numberBetween($min = 100, $max = 1000),
        'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'representante_legal' => $faker->firstName,
        'id_representante' => $faker->unique()->numberBetween($min = 100, $max = 1000),
        'telefono' => $faker->numberBetween($min = 10000, $max = 100000),
        'razon_social' => 'S.A.',
        'per_jur' => $faker->randomElement($tipos_persona_juridica),
        'departamento' => 'Risaralda',
        'direccion' => 'Pereira',
        'ciudad' => 'Pereira'
    ];
});
