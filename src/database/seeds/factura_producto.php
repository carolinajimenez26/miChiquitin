
<?php
use Illuminate\Database\Seeder;
class factura_producto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 3;
        for ($i = 0; $i < $limit; $i++) {
            DB::table("factura_productos")->insert([ //,
            	'id_factura' => '1',
                'id_articulo' => '1',
                'cantidad' => '3',
                'precio_venta' => '40000',
            ]);
        }
    }
}
