<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Usuarios\Empleado;

class ValidarCliente extends Controller
{
	public function index(){
		return view('Facturacion.index')->with('status','0')
										->with('id_cliente','0');
	}
	
	public function validar(Request $request){

		$id_cliente = $request->id_cliente;	
		$id_vendedor =$request->id_vendedor;
		$Empleado = Empleado::where("id_empleado", $id_cliente)->get();
		if(sizeof($Empleado) > 0){
			if(strcmp($Empleado[0]->cargo, "vendedor") == 0){
				$Vendedor = Empleado::where("id_empleado", $id_vendedor)->get();
				if(sizeof($Vendedor) > 0){
					if(strcmp($Vendedor[0]->cargo, "administrador") == 0){
						if(!is_null($id_cliente)) {
							return view('Facturacion.compra')->with('id_cliente',$id_cliente)
															 ->with('metodo',$request->metodo)
															 ->with('cuotas',$request->cuotas);
						} else {
							return view('Facturacion.index')->with('status','2');
						}
					}
					else{
						return view('Facturacion.index')->with('status','1');
					}
				}
			}
		}
		else{
			if(!is_null($id_cliente)) {
				return view('Facturacion.compra')->with('id_cliente',$id_cliente)
												 ->with('metodo',$request->metodo)
												 ->with('cuotas',$request->cuotas);
			} else {
				return view('Facturacion.index')->with('status','2');
			}
		}
	}
}
