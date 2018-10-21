<?php
use Illuminate\Database\Seeder;
use App\Models\Inventario\Pedido;

class pedidoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pedido::class, 30)->create();
    }
}