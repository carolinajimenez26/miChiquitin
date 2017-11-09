<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inventario\Articulo;
use App\Models\Facturacion\FacturaProducto;

class CompraProducto extends Controller
{

	public function insertFacturaProducto(Request $req) {
		// if req is not null
		$new = new FacturaProducto;
		$new->id_factura = $req->id_factura;
		$new->id_articulo = $req->id_articulo;
		$new->cantidad = $req->cantidad;
		$new->precio_venta = $req->precio_venta;

		$new->save();
	}

	public function precioVenta($id_producto) {

		$Producto = Articulo::where("id", $id_producto)->get();
		if ($Producto[0]->cantidad > 0) {
			$PrecioBase = $Producto[0]->precio_basico;
			$PrecioProducto = $PrecioBase + ($PrecioBase*0.25);
			echo "El precio de base del producto es: ".$PrecioBase;
			echo "\n El precio real del producto es: ".$PrecioProducto;
			return $PrecioProducto;
		}
	}

	public function registrarProductos($id_producto, $cantidad, $idFactura) {

		$Producto = Articulo::where("id", $id_producto)->get();

		if (($Producto[0]->cantidad <= $cantidad) and ($Producto[0]->cantidad - $cantidad < 500)) {
			$cantidadPendiente = $cantidad - $Producto[0]->cantidad;
			$bandera = 0;
		} else {
			return -1;
		}

		$valorVenta = self::precioVenta($id_producto);

		if ($cantidad > 0){
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

		if ($bandera = 0){
			self::insertFacturaProducto($req);
			$nuevaCantidad = $cantidadInv - $cantidadPendiente;
			Articulo::where('id', $id_producto)->update(['cantidad' => $nuevaCantidad]);
			echo "Cantidad actualizada, el inventario disponible ahora es:".$nuevaCantidad;
			echo "Se deben : ".$cantidadPendiente;
		}
	}
}
