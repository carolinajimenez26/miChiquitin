<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facturacion\Factura;
use App\Models\Facturacion\FacturaDeuda;
use App\Models\Cartera\Deuda;
use App\Models\Cartera\Pago;
use Carbon\Carbon;

class pagoDeuda extends Controller
{

  public function index(){
    return view('Facturacion.cuota');
  }

  public function pagar(Request $request) {

    $abono = $request->abono;
    $idFactura = $request->id_factura;

    $abono = (int)$abono;
    //echo "<br>abono ".$abono;
    $idFactura = (int)$idFactura;
    //echo "<br>idFactura ".$idFactura;
    $factura = Factura::find($idFactura);
    $deuda = Deuda::where("id_factura", $idFactura)->get();
    //echo "<br>id_deuda ".$deuda[0]->id_deuda;

    if (($factura == null) or ($factura->id_plan_pago == 1)) {
      dd("ID de la Factura no válida.");
    } else {
      $valor_cuota = $factura->valor_cuota; // 407.45 -> 6 cuotas
      //echo "<br>valor_cuota ".$valor_cuota;
      dd("Hola",$deuda);
      $valor_restante = $deuda[0]->valor_a_pagar; // 150000
      //echo "<br>valor_restante ".$valor_restante;
      if ($valor_restante == 0) {
        dd("La Factura ya esta paga, este es el id: ", $idFactura);
      } else {
        if ($abono >= $valor_cuota && $abono <= $valor_restante) {
          //echo "<br>abono >= valor_cuota && abono <= valor_restante";
          $full_date = Carbon::now('America/Bogota');
          //echo "<br>full_date ".$full_date;
          $date = Carbon::now('America/Bogota')->format('Y-m-d');
          //echo "<br>date ".$date;
          $time = $full_date->toTimeString();
          //echo "<br>time ".$time;

          FacturaDeuda::create([
            'id_factura' => $idFactura,
            'abono' => $abono,
            'fecha' => $date,
            'hora' => $time
          ]); // no lo crea

          Pago::create([
            'id_deuda' => $deuda[0]->id_deuda,
            'valor' => $abono
          ]); // no lo crea

          Deuda::where('id_factura', $idFactura)->update([
            'valor_pagado' => $deuda[0]->valor_pagado + $abono,
            'valor_a_pagar' => $deuda[0]->valor_a_pagar - $abono
          ]);

          if ($deuda->valor_a_pagar == 0) { // NO ES SEGURO
            Factura::where('id_factura', $idFactura)->update([
              'estado' => 'cancelado',
            ]);

            Deuda::where('id_factura', $idFactura)->update([
              'estado' => 'cancelado',
            ]);
          }

          dd("Se ha realizado un abono de ", $abono);
        } else if ($valor_cuota > $valor_restante) {
          //echo "<br>valor_cuota > valor_restante";
          $full_date = Carbon::now('America/Bogota');
          $date = Carbon::now('America/Bogota')->format('Y-m-d');
          $time = $full_date->toTimeString();
          $devolucion = $abono - $valor_restante;

          FacturaDeuda::create([
            'id_factura' => $idFactura,
            'abono' => $valor_restante,
            'fecha' => $date,
            'hora' => $time
          ]);

          Pago::create([
            'id_pago' => '',
            'id_deuda' => $deuda[0]->id_deuda,
            'valor' => $valor_restante
          ]);

          Deuda::where('id_factura', $idFactura)->update([
            'valor_pagado' => $deuda[0]->valor_pagado + $valor_restante,
            'valor_a_pagar' => $deuda[0]->valor_a_pagar - $valor_restante
          ]);

          if ($deuda->valor_a_pagar == 0) {
            Factura::where('id_factura', $idFactura)->update([
              'estado' => 'cancelado',
            ]);

            Deuda::where('id_factura', $idFactura)->update([
              'estado' => 'cancelado',
            ]);
          }

          echo "Le sobra al cliente ".$devolucion;
          dd("Se ha realizado un abono de ", $valor_restante);
        } else {
          dd("Debe pagar un monto mayor o igual a ", $valor_cuota);
        }
      }
    }
  }
}
