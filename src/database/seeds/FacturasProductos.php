<?php

use Illuminate\Database\Seeder;
use App\Models\Facturacion\FacturaProducto;

class FacturasProductos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FacturaProducto::class, 5)->create();
    }
}
