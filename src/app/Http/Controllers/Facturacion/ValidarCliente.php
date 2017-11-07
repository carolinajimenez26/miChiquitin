<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuarios\Empleado;

class ValidarCliente extends Controller
{
	public function validar($id_cliente, $id_vendedor){

		$Empleado = Empleado::where("id_empleado", $id_cliente)->get();
		if(sizeof($Empleado) > 0){
			if(strcmp($Empleado[0]->cargo, "vendedor") == 0){
				echo "El cliente es un vendedor.";
				$Vendedor = Empleado::where("id_empleado", $id_vendedor)->get();
				if(sizeof($Vendedor) > 0){
					if(strcmp($Vendedor[0]->cargo, "administrador") == 0){
						echo "\n El vendedor es un administrador, se puede ralizar la venta.";
						return true; //Llama caso de uso 003
					}
					else{
						echo "No es un administrador, no se puede realizar la venta.";
						return false;
					}
				}
			}
		}
		else{
			echo "No es un vendedor, se puede realizar la venta.";
			return true; //Llama caso de uso 003
		}
	}
}
