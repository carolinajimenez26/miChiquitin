<?php

use App\Models\Contabilidad\Varcontrol;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      $this->call(rootSeeder::class);
      $this->call(empresaSeeder::class);
      $this->call(varcontrolsTableSeeder::class);
      $this->call(adminSeed::class);
      $this->call(Contratos::class);
      factory(App\Models\Usuarios\Cliente::class,10)->create();
      factory(App\Models\Usuarios\Empleado::class,15)->create();  //este factory no generra la foreign key para id_usuario


      $this->call(Planpago::class);


      
      //factory(App\Models\Inventario\Pedido::class, 40)->create();

      $this->call(Proveedores::class);
      $this->call(Articulos::class);
      $this->call(Users::class);
      $this->call(Clientes::class);
      $this->call(Facturas::class);
      $this->call(FacturasProductos::class);
      $this->call(plan_pago::class);
      $this->call(Proveedores::class);
      $this->call(usuario::class);
      //$this->call(Empresas::class);
      //$this->call(Empleados::class);
      //$this->call(PlanDePagos::class);
      $this->call(Deudas::class);

    }
  }
