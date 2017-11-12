<?php
namespace App\Http\Controllers\Facturacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuarios\Empleado;

class ValidarCliente extends Controller
{
	public function validar($id_cliente, $id_vendedor) {
		$Empleado = Empleado::where("id_empleado", $id_cliente)->get();
		if(sizeof($Empleado) > 0){
			if(strcmp($Empleado[0]->cargo, "vendedor") == 0){
				// echo "El cliente es un vendedor.";
				$Vendedor = Empleado::where("id_empleado", $id_vendedor)->get();
				if(sizeof($Vendedor) > 0){
					if(strcmp($Vendedor[0]->cargo, "administrador") == 0){
						// echo "\n El vendedor es un administrador, se puede ralizar la venta.";
						return true;
					}
					else{
						// dd("No es un administrador, no se puede realizar la venta.");
						return false;
					}
				}
			}
		}
		else{
			// dd("No es un vendedor, se puede realizar la venta.");
			return false;
		}
	}

	public function index() {
		return view('Facturacion.index');
	}


	public function intermediar(Request $request) {
		$id_cliente = $request->id_cliente;
		// echo "<br> id_cliente ".$id_cliente;
		$id_vendedor = $request->id_vendedor;
		// echo "<br> id_vendedor ".$id_vendedor;
		
		// if (self::validar($id_cliente, $id_vendedor)) {
		if (true) {
			return view('Facturacion.compra')->with('id_cliente',$id_cliente)->with('metodo',$request->metodo)->with('cuotas',$request->cuotas)->with('id_vendedor',$id_vendedor);
		} else {
			return view('Facturacion.error')->with('error', "Error en la identificación del cliente");
		}
	}
}
