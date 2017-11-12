<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inventario\Articulo;
use App\Models\Facturacion\FacturaProducto;

class CompraProducto extends Controller
{
	public function index(){
		$articulos = "hola mundo";
		return view('Facturacion.compra')->with('id_cliente',$id_cliente)->with('articulos', $articulos);
	}

	public function imprimirFactura(Request $request) {

		dd($request);

		/*
			TODO: Este controlador inicia cuando se oprime el botón "Generar Factua"
			desde la vista. Este controlador tiene que hacer:
				* traerse el id_cliente, id_vendedor, valor_total_pagar
				* preguntar si el plan de pago es Efectivo o Crédito
					* Si es Efectivo:
						* Deberá llamar al método compraEfectivo del controlador MetodoDePago
							y generar la factura con TODOS los datos pertinentes.
						* Una vez generada la factura, deberá retornar view('Facturacion.factura')
						  con TODOS los valores informativos
					* Si es Crédito:
					* Deberá llamar al método compraCredito del controlador MetodoDePago
						y generar la factura con TODOS los datos pertinentes.
					* Una vez generada la factura, deberá retornar view('Facturacion.factura')
						con TODOS los valores informativos.
				* Retornar la vista de error si en alguno de los casos anteriores se necesita
		*/

		// $id_cliente = $request->id_cliente;
		// echo "<br> id_cliente ".$id_cliente;
		// $id_vendedor = $request->id_vendedor;
		// echo "<br> id_vendedor ".$id_vendedor;
		// $plan_pago = $request->metodo;
		// echo "<br>plan_pago ".$plan_pago;
		// $cuotas = $request->cuotas;
		// echo "<br>cuotas ".$cuotas;
		// return view('Facturacion.factura');
	}

	public function insertFacturaProducto(Request $req) {
		// if req is not null
		$new = new FacturaProducto;
		$new->id_factura = $req->id_factura;
		$new->id_articulo = $req->id_articulo;
		$new->cantidad = $req->cantidad;
		$new->precio_venta = $req->precio_venta;

		$new->save();
	}

	public function precioVenta($id_producto, $precioBase){
			$porcentaje = ($precioBase*0.25);
			$PrecioProducto = $precioBase + $porcentaje;
			return $PrecioProducto;
	}

	public function registrarProductos($id_producto, $cantidad, $idFactura){

		$Producto = Articulo::where("id", $id_producto)->get();
		if ($Producto[0]->cantidad >= $cantidad) {

			$valorVenta = self::precioVenta($id_producto);
			if ($valorVenta == -1){
				echo "No hay disponibilidad del producto";
				// return false
			} else {
				$FacturaProducto = FacturaProducto::where("id_factura", $idFactura)->get();
				if (sizeof($FacturaProducto) > 0) {
					FacturaProducto::where('id_articulo', $id_producto)->where('id_factura', $idFactura)->update(['cantidad' => $FacturaProducto[0]->cantidad + $cantidad]);
				} else {
					$req = new Request();
					$req->id_factura = $idFactura;
					$req->id_articulo = $id_producto;
					$req->cantidad = $cantidad;
					$req->precio_venta = $valorVenta;

					self::insertFacturaProducto($req);
				}

				$cantidadInv = $Producto[0]->cantidad;
				$nuevaCantidad = $cantidadInv - $cantidad;
				Articulo::where('id', $id_producto)->update(['cantidad' => $nuevaCantidad]);
				echo "Cantidad actualizada, el inventario disponible ahora es:".$nuevaCantidad;
				//return true;
			}
		} else {
			echo "No hay inventario suficiente del producto";
			//return false;
		}
	}


	public function compra($cantidad, $id_producto){
		$Producto = Articulo::where("id", $id_producto)->get();
		if (count($Producto) >0){
			$pendiente = $Producto[0]->cantidad - $cantidad;
			$descripcion = $Producto[0]->descripcion;
			$valorVenta = self::precioVenta($id_producto, $Producto[0]->precio_basico);
			$unitario = $valorVenta;
			$total = $valorVenta * $cantidad;
			if ($pendiente > 0) {
				$pendiente = 0;
			}
			return response()->json([
				'id_producto' => $id_producto,
				'descripcion' => $descripcion,
				'cantidad' => $cantidad,
				'unitario' => $valorVenta,
				'total' => $total,
				'pendiente' => $pendiente,
				'cantidadInventario' => $Producto[0]->cantidad,
			]);
		}
		return "false";

		
	}




}
