<?php
use Illuminate\Database\Seeder;
use App\Models\Inventario\Proveedor;

class proveedorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Proveedor::class, 5)->create();
    }
}