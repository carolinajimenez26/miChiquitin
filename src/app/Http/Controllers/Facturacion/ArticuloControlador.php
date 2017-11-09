<?php

namespace App\Http\Controllers\Facturacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Inventario\Articulo;
use App\Models\Facturacion\FacturaProducto;
use App\Models\Facturacion\Factura;

class ArticuloControlador extends Controller
{
  public function EliminarArticulo($id, $cantidadActual, $cantidadEliminar, $idFactura) {
    if(is_string($id)){
      $articuloFactura = FacturaProducto::where("id", $id)->get();
      if(sizeof($articuloFactura) > 0 ) {

        if($cantidadEliminar < $cantidadActual) {
          $CantidadFactura = $cantidadActual - $cantidadEliminar;
          FacturaProducto::where("id", $id)->update(['cantidad' => $CantidadFactura]);

          $idArticulo = $articuloFactura[0]->id_articulo;

          $articuloInventario = Articulo::where('id', $idArticulo)->get();
          $CantidadInventario = $articuloInventario[0]->cantidad + $cantidadEliminar;
          Articulo::where("id", $idArticulo)->update(['cantidad' => $CantidadInventario]);
        } elseif($cantidadEliminar == $cantidadActual) {

          $articuloFactura = FacturaProducto::where("id", $id)->get();
          $idArticulo = $articuloFactura[0]->id_articulo;
          $articuloFactura->delete();

          $articuloInventario = Articulo::where('id', $idArticulo)->get();
          $CantidadInventario = $articuloInventario[0]->cantidad + $cantidadEliminar;
          Articulo::where("id", $idArticulo)->update(['cantidad' => $CantidadInventario]);
        } else {
          dd("Cantidad invalida, supera la cantidad actual");
        }

      } else {
        dd("Articulo no encontrado en la factura");
      }

    } else {
      dd("Identificador invalido, intente nuevamente");
    }
  }

  public function CancelarCompra($idFactura) {
    if(is_numeric($idFactura)){
      $articulosFactura = FacturaProducto::where("id_factura", $idFactura)->get();
      if(sizeof($articuloFactura) > 0 ) {
        foreach ($articulosFactura as $articulo) {
          $idArticulo = $articulo->id_articulo;
          $cantidadEliminar = $articulo->cantidad;
          $articulo->delete();

          $articuloInventario = Articulo::where('id', $idArticulo)->get();
          $CantidadInventario = $articuloInventario[0]->cantidad + $cantidadEliminar;
          Articulo::where("id", $idArticulo)->update(['cantidad' => $CantidadInventario]);
          dd("Factura cancelada");
        }
      } else {
        dd("Factura no encontrada!");
      }
    } else {
      dd("Identificador invalido, intente nuevamente");
    }

    //Revisar si es necesario eliminar cada producto.
    //  $Factura = Factura::where("id", $idFactura)->get();
    //  $Factura[0]->delete();
    //  dd("Factura cancelada");
    //  dd($Factura);
  }

}
