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

use App\Models\Inventario\Proveedor;
use App\Models\Inventario\Articulo;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Inventario\Pedido::class, function (Faker\Generator $faker) {
    static $password;

    $array_articulos = Articulo::all()->pluck('id')->toArray();
    $articulo = $faker->randomElement($array_articulos);
    $articuloObject = Articulo::find($articulo);
    $precio_basico = $articuloObject->precio_basico;
    $cantidad = $faker->numberBetween($min = 5, $max = 20);
    $costo_total = $precio_basico * $cantidad;

    $array_proveedores = Proveedor::all()->pluck('id')->toArray();

    return [
        'id_articulo' => $articulo,
        'id_proveedor' => $faker->randomElement($array_proveedores),
        'cantidad' => $cantidad,
        'costo_total' => $costo_total,
        'fecha' => $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get()) ,
        'estado' => 'EnEspera'
    ];
});
