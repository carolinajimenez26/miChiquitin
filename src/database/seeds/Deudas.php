<?php

use Illuminate\Database\Seeder;
use App\Models\Cartera\Deuda;

class Deudas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Deuda::class, 5)->create();
    }
}
