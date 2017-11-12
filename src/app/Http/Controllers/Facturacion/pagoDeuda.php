<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facturacion\Factura;
use App\Models\Facturacion\FacturaDeuda;
use Carbon\Carbon;

class pagoDeuda extends Controller
{
	public function pagar($idFactura, $cuota){
    $cuota = (int)$cuota;
    $idFactura = (int)$idFactura;
    $factura = Factura::find($idFactura);
    if ($factura == null) {
      dd("ID de la Factura no válida.");
    } else {
      $valor_cuota = $factura->valor_cuota;
      if ($cuota >= $valor_cuota) {
        $full_date = Carbon::now('America/Bogota');
        $date = Carbon::now('America/Bogota')->format('Y-m-d');
        $time = $full_date->toTimeString();

        $nueva_entrada = [
          'id_factura' => $idFactura,
          'abono' => $cuota,
          'fecha' => $date,
          'hora' => $time
        ];

        FacturaDeuda::create($nueva_entrada);

        dd("Se ha realizado un abono de ", $cuota);
      } else {
        dd("Debe pagar un monto mayor o igual a ", $valor_cuota);
      }
    }
	}
}
