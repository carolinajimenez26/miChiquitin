<?php

namespace App\Http\Controllers\Facturacion;

use App\Models\Contabilidad\Varcontrol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facturacion\Factura;
use App\Models\Facturacion\FacturaDeuda;
use App\Models\Cartera\Deuda;
use App\Models\Cartera\Pago;
use Carbon\Carbon;

class pagoDeuda extends Controller
{
  public function index() {
    return view('Facturacion.cuota');
  }

  public function pagar(Request $request){
    $abono = $request->abono;
    $idFactura = $request->id_factura;
    $abono = (int)$abono;
    // echo "<br>abono ".$abono;
    $idFactura = (int)$idFactura;
    // echo "<br>idFactura ".$idFactura;
    $factura = Factura::find($idFactura);
    $deuda = Deuda::where("id_factura", $idFactura)->get();
    // echo "<br>id_deuda ".$deuda[0]->id_deuda;
    $full_date = Carbon::now('America/Bogota');
    // echo "<br>full_date ".$full_date;
    $date = Carbon::now('America/Bogota')->format('Y-m-d');
    // echo "<br>date ".$date;
    $time = $full_date->toTimeString();
    // echo "<br>time ".$time;

    if ($factura == null) {
      // dd("ID de la Factura no válida.");
      return view('Facturacion.error')->with('error', "ID de la Factura no válida.");
    } else {
      $valor_cuota = $factura->valor_cuota; // 407.45 -> 6 cuotas
      // echo "<br>valor_cuota ".$valor_cuota;
      $valor_restante = $deuda[0]->valor_a_pagar;
      //echo "<br>valor_restante ".$valor_restante;
      if ($valor_restante == 0) {
        // dd("La Factura ya esta paga, este es el id: ", $idFactura);
        $msg = "La Factura ya esta paga, este es el id: " . $idFactura;
        return view('Facturacion.pagoDeuda')->with('msg', $msg);
      } else {
        if ($abono >= $valor_cuota && $abono < $valor_restante) {
          //echo "<br>abono >= valor_cuota && abono <= valor_restante";

          FacturaDeuda::create([
            'id_factura' => $idFactura,
            'abono' => $abono,
            'fecha' => $date,
            'hora' => $time
          ]);

          Pago::create([
            'id_deuda' => $deuda[0]->id_deuda,
            'valor' => $abono
          ]);

          Deuda::where('id_factura', $idFactura)->update([
            'valor_pagado' => $deuda[0]->valor_pagado + $abono,
            'valor_a_pagar' => $deuda[0]->valor_a_pagar - $abono
          ]);

          // dd("Se ha realizado un abono de ", $abono);
          $msg = "Se ha realizado un abono de " . $abono;
          return view('Facturacion.pagoDeuda')->with('msg', $msg);
        } else if ($abono >= $valor_restante) {
          //echo "<br>abono > valor_restante";
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
            'valor_a_pagar' => $deuda[0]->valor_a_pagar - $valor_restante,
            'estado' => 'cancelado'
          ]);

          $efectivo = Varcontrol::where('nombre', '=', 'efectivo')->get()->first();
          $resta = $efectivo->valor + $valor_restante;
          $efectivo->update(['valor' => $resta]);

          Factura::where('id', $idFactura)->update([
            'estado' => 'cancelado'
          ]);

          // dd("Le sobra al cliente ", $devolucion);
          // dd("Se ha realizado un abono de ", $valor_restante);
          $msg = "Le sobra al cliente " . $devolucion
                 . ". Se ha realizado un abono de " . $valor_restante;
          return view('Facturacion.pagoDeuda')->with('msg', $msg);
        } else {
          // dd("Debe pagar un monto mayor o igual a ", $valor_cuota);
          $msg = "Debe pagar un monto mayor o igual a " . $valor_cuota;
          return view('Facturacion.error')->with('error', $msg);
        }
      }
    }
  }
}
