<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facturacion\FacturaProducto;
use App\Models\Facturacion\Factura;
use App\Models\Inventario\Articulo;

class pedido extends Controller
{
    
	public function pedido(){
		 return view('Facturacion.entregaPedido');

	}

	public function entrega(Request $id_cliente){
		$fac = factura::where('id_cliente', $id_cliente->id_cliente)->select("id")->get()->toArray();
		$facturas = FacturaProducto::whereIN('id_factura', $fac)->where("pendiente", "<", 0)->get();
		$id_articulo = FacturaProducto::whereIN('id_factura', $fac)->where("pendiente", "<", 0)->select("id_articulo")->get();
		$i = 0;
		$lista = array();
		while($i < count($id_articulo)){
			$cantidad = Articulo::where("id", $id_articulo[$i]->id_articulo)->select("cantidad")->get();
			array_push($lista, $cantidad[0]->cantidad);
			$i = $i+1;
		}
		return view('Facturacion.entregaPedido' ,array('facturas' => $facturas, 'cantidad' => $lista));
	}


	public function descontar(Request $request){

		if($request->cantidadInventario <= 0){
			return view('Facturacion.entregaPedido')->with('men', "No se puedo realizar la entrega no hay articulo en el inventario");
		}
		else{
			$producto = Articulo::where("id", $request->id_articulo)->get();
			$resta = $producto[0]->cantidad + $request->cantidadPendiente;
			$producto[0]->cantidad = $resta;
          	$producto[0]->save();
          	$facturas = FacturaProducto::where("id", $request->id_factura)->get();
          	if($resta >= 0){
          		$facturas[0]->pendiente = 0;
          		$facturas[0]->save();
          		return view('Facturacion.entregaPedido')->with('men', "Entrega Realizada. No queda pendiente este articulo");
          	}
          	else{
	          	$facturas[0]->pendiente = $resta;
	          	$facturas[0]->save();
	          	return view('Facturacion.entregaPedido')->with('men', "Entrega Realizada. faltan por entregar "+ abs($resta) +" de este articulo");
          	}
		}
	}


}
