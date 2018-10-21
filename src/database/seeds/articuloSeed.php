<?php
use Illuminate\Database\Seeder;
use App\Models\Inventario\Articulo;

class articuloSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Articulo::class, 20)->create();
    }
}