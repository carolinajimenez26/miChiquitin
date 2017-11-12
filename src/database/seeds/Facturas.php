<?php

use Illuminate\Database\Seeder;
use App\Models\Facturacion\Factura;

class Facturas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Factura::class, 5)->create();
    }
}
