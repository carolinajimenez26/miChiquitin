<?php

namespace App\Http\Controllers\Contabilidad;

use App\Models\Contabilidad\nomina;
use App\Models\Contabilidad\pagoProveedores;
use App\Models\Contabilidad\Varcontrol;
use App\Models\Facturacion\Factura;
use App\Models\Inventario\Pedido;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;

class balanceCtr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if(!(Auth::user()->email == 'root@gmail.com')){
            $empleado = Auth::user()->empleado;
            if(is_null($empleado)) abort('403');
            if(is_null($empleado->permiso)) abort('403');
        }
        $tipo = $request->input('tipo');
        switch ($tipo) {
            case 'dia':
                $dt = Carbon::now();
                $dt = $dt->format('Y-m-d');
                $format = 'yyyy-mm-dd';
                $min = 0;
                break;
            case 'mes':
                $dt = Carbon::now();
                $dt = $dt->format('Y-m');
                $format = 'yyyy-mm';
                $min = 1;

                break;

            case 'an':
                $dt = Carbon::now();
                $dt = $dt->format('Y');
                $format = 'yyyy';
                $min = 2;

                break;
            default:
                abort('404');
                break;
        }
        $str = $dt . '%';
        $facturas = Factura::where('fecha', 'like', $str)->get();
        $vendido = 0;
        $cobrado = 0;
        $cobrar = 0;
        $totalpagar = 0;
        $pagado = 0;
        $pagar = 0;
        $total1 = 0;
        $total2 = 0;
        $total3 = 0;
        $tcobrar = 0;
        $tpagar = 0;
        $efectivo = Varcontrol::where('nombre', '=', 'efectivo')->get()->first();
        $efectivo = $efectivo->valor;
        foreach ($facturas as $factura) {
            $vendido += $factura->valor_total;
            if(!is_null($factura->deuda)){
                $cobrado += $factura->deuda->valor_pagado;
                $cobrar += $factura->valor_total - $factura->deuda->valor_pagado;
            }
            else{
                $cobrado += $factura->valor_total;
            }
        }
        $pagos = nomina::where('fecha_prenomina', 'like', $str)->get();
        foreach ($pagos as $pago){
            $totalpagar += ($pago->base + (3 * $pago->salud) + $pago->aux_transporte);
            if($pago->estado == 'Pagado'){
                $pagado += ($pago->base + (3 * $pago->salud) + $pago->aux_transporte);
            }
            else{
                $pagar += ($pago->base + (3 * $pago->salud) + $pago->aux_transporte);
            }
        }

        $pedidos = Pedido::where('fecha', 'like', $str)->get();
        foreach ($pedidos as $pedido){
            if($pedido->estado == 'EnEspera'){
                $pagar += $pedido->costo_total;
                $totalpagar += $pedido->costo_total;
            }
        }

        $pagos = pagoProveedores::where('fecha_pago', 'like', $str);
        foreach ($pagos as $pago){
            $totalpagar += $pago->valor_pagar;
            $pagado += $pago->valor_pagar;
        }

        $total1 = $vendido - $totalpagar;
        $total2 = $cobrado - $pagado;
        $total3 = $cobrar - $pagar;

        $facturas = Factura::whereDate('fecha', '<=', Carbon::today()->toDateString())
            ->get();
        foreach ($facturas as $factura) {
            if(!is_null($factura->deuda)){
                $tcobrar += $factura->valor_total - $factura->deuda->valor_pagado;
            }
        }
        $nominas = nomina::where('estado', '=', 'PorPagar')->get();

        foreach ($nominas as $pago){
            $tpagar += ($pago->base + (3 * $pago->salud) + $pago->aux_transporte);
        }

        $pedidos = Pedido::where('estado','=', 'EnEspera')->get();
        foreach ($pedidos as $pedido){
            $tpagar += $pedido->costo_total;
        }


        return view('Contabilidad.balances')->with(
            [
                'date'=> $dt,
                'format' => $format,
                'min'=> $min,
                'tipo' => $tipo,
                'vendido' => $vendido,
                'cobrado' => $cobrado,
                'cobrar' => $cobrar,
                'totalpagar' => $totalpagar,
                'pagado' => $pagado,
                'pagar' => $pagar,
                'total1' => $total1,
                'total2' => $total2,
                'total3'=> $total3,
                'tcobrar' => $tcobrar,
                'tpagar' => $tpagar,
                'efectivo' => $efectivo
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 'balance';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getBalance(Request $request){
        $rtJson    = [
            'ok' => false,
            'err' => 'Algo salio mal',
        ];

        try{
            $input = $request->all();
            $tipo = $input['tipo'];
            $str = $input['dt'] . '%';
            $facturas = Factura::where('fecha', 'like', $str)->get();
            $vendido = 0;
            $cobrado = 0;
            $cobrar = 0;
            $totalpagar = 0;
            $pagado = 0;
            $pagar = 0;
            $total1 = 0;
            $total2 = 0;
            $total3 = 0;
            $tcobrar = 0;
            $tpagar = 0;
            $efectivo = Varcontrol::where('nombre', '=', 'efectivo')->get()->first();
            $efectivo = $efectivo->valor;
            foreach ($facturas as $factura) {
                $vendido += $factura->valor_total;
                if(!is_null($factura->deuda)){
                    $cobrado += $factura->deuda->valor_pagado;
                    $cobrar += $factura->valor_total - $factura->deuda->valor_pagado;
                }
                else{
                    $cobrado += $factura->valor_total;
                }
            }
            $pagos = nomina::where('fecha_prenomina', 'like', $str)->get();
            foreach ($pagos as $pago){
                $totalpagar += ($pago->base + (3 * $pago->salud) + $pago->aux_transporte);
                if($pago->estado == 'Pagado'){
                    $pagado += ($pago->base + (3 * $pago->salud) + $pago->aux_transporte);
                }
                else{
                    $pagar += ($pago->base + (3 * $pago->salud) + $pago->aux_transporte);
                }
            }

            $pedidos = Pedido::where('fecha', 'like', $str)->get();
            foreach ($pedidos as $pedido){
                if($pedido->estado == 'EnEspera'){
                    $pagar += $pedido->costo_total;
                    $totalpagar += $pedido->costo_total;
                }
            }

            $pagos = pagoProveedores::where('fecha_pago', 'like', $str);
            foreach ($pagos as $pago){
                $totalpagar += $pago->valor_pagar;
                $pagado += $pago->valor_pagar;
            }

            $total1 = $vendido - $totalpagar;
            $total2 = $cobrado - $pagado;
            $total3 = $cobrar - $pagar;

            $facturas = Factura::whereDate('fecha', '<=', Carbon::today()->toDateString())
                ->get();
            foreach ($facturas as $factura) {
                if(!is_null($factura->deuda)){
                    $tcobrar += $factura->valor_total - $factura->deuda->valor_pagado;
                }
            }
            $nominas = nomina::where('estado', '=', 'PorPagar')->get();

            foreach ($nominas as $pago){
                $tpagar += ($pago->base + (3 * $pago->salud) + $pago->aux_transporte);
            }

            $pedidos = Pedido::where('estado','=', 'EnEspera')->get();
            foreach ($pedidos as $pedido){
                $tpagar += $pedido->costo_total;
            }

                $rtJson['date']= $input['dt'];
                $rtJson['tipo'] = $tipo;
                $rtJson['vendido'] = $vendido;
                $rtJson['cobrado'] = $cobrado;
                $rtJson['cobrar'] = $cobrar;
                $rtJson['totalpagar'] = $totalpagar;
                $rtJson['pagado'] = $pagado;
                $rtJson['pagar'] = $pagar;
                $rtJson['total1'] = $total1;
                $rtJson['total2'] = $total2;
                $rtJson['total3']= $total3;
                $rtJson['tcobrar'] = $tcobrar;
                $rtJson['tpagar'] = $tpagar;
                $rtJson['efectivo'] = $efectivo;

            // try code
            $rtJson['ok']=true;
        }
        catch(\Exception $e){
            $rtJson['err'] = 'Algo salió mal' . $e;
        }
        return $rtJson;
    }
}
