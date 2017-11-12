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

use App\Models\Facturacion\Factura;
use App\Models\Facturacion\FacturaProducto;
use App\Models\Inventario\Articulo;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Facturacion\FacturaProducto::class, function (Faker\Generator $faker) {
    $facturaIds = Factura::all()->pluck('id')->toArray();
    $articuloIds = Articulo::all()->pluck('id')->toArray();
    $factura = $faker->randomElement($facturaIds);
    $articulo =$faker->randomElement($articuloIds);
    return [
        'id_factura' => $factura,
        'id_articulo' => $articulo,
        'cantidad' => $faker->numberBetween($min = 1, $max = 10),
        'precio_venta' => $faker->numberBetween($min = 1000, $max = 2000),
        'pendiente' => $faker->numberBetween($min = 0, $max = 5),
    ];
});