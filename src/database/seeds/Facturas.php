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
/**
<?php
use Illuminate\Database\Seeder;
class factura extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 3;
        for ($i = 0; $i < $limit; $i++) {
            DB::table("facturas")->insert([ //,
            	'fecha' => '2017-11-01',
                'id_cliente' => '3',
                'id_plan_pago' => '1',
                'cuotas' => '0',
                'valor_cuota' => '0', 
                'id_vendedor' => '2',
                'valor_total' => '400000',
                'estado' => 'pagado',
            ]);
        }
    }
}
*/
