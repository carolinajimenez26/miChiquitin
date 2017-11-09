<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuarios\User;
use App\Models\Facturacion\Factura;

class MetodoDePago extends Controller
{
	public function metodoPago($metodo, $valorTotal, $idCliente, $N, $idFactura){
		if ($metodo == '1'){
      self::compraEfectivo($valorTotal, $idFactura);
		}

		if ($metodo == '2' or $metodo == '3' or $metodo == '4') {
			self::compraCredito($idCliente, $valorTotal, $N, $idFactura);
		}
	}

  public function compraEfectivo( $valorTotal, $idFactura) {
    $totalPagar = $valorTotal - ($valorTotal*0.05);
    $factura = Factura::find($idFactura);
    if (count($factura)) {
      $factura->update(['cuotas' => 0]);
      $factura->update(['valor_cuota' => 0]);
      $factura->update(['valor_total' => $totalPagar]);
      $factura->update(['estado' => "cancelado"]);
    }
  }

  public function numeroCuotas($N, $valorTotalCompra, $idFactura) {
    $factura = Factura::find($idFactura);
    $valorTotalCompra = $valorTotalCompra + ($valorTotalCompra * 0.05);
    $valorPagar = $valorTotalCompra * 0.10;
    $factura->update(['cuotas' => $N]);
    $factura->update(['valor_cuota' => ($valorTotalCompra - $valorPagar) / $N]);

    return $valorPagar;
  }

  public function compraCredito($idCliente, $valorTotalPago, $N, $idFactura) {
    $cliente = User::find($idCliente);
    $factura = Factura::find($idFactura);
    $credito_actual = $cliente->credito_actual;
    if ($valorTotalPago <= $credito_actual) {
      $totalPagar = self::numeroCuotas($N, $valorTotalPago,$idFactura);
      $factura->update(['valor_total' => $totalPagar]);
      $cliente->update(['credito_actual' => $credito_actual - $valorTotalPago]);

      //Revisar credito actual
      // echo "Credito actual : ".$credito_actual;
      // echo "Valor total a pagar : ".$valorTotalPago;
      // echo "Nuevo credito actual : ".$credito_actual - number_format($valorTotalPago, 2,'.',',');
      // dd($totalPagar);
    } else {
      dd("No tiene crédito");
    }
  }
}
