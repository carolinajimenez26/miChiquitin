<?php

namespace App\Http\Controllers\Inventario;
use App\Http\Controllers\Controller;

use App\Models\Inventario\Pedido;
use App\Models\Inventario\Proveedor;
use App\Models\Inventario\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Pedido::where('borrado', '=', 2)->paginate(10);
        
        return view('Inventario/pedidos', compact('data'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $Id_Proveedor = $request->id;
        $Articulos = DB::table('articulos')->select('id','nombre')->where('id_proveedor','=',$Id_Proveedor)->get();
        return view('Inventario/agregar_pedido_articulo', compact('Articulos','Id_Proveedor'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $Proveedores = Proveedor::where('borrado','=',2)->get();
        return view('Inventario/agregar_pedido', compact('Proveedores'));
    }    

    public function showArticulo(Request $request)
    {
        //$id_proveedor = $request->id_proveedor;
        $id_articulo = $request->id_articulo;
        $Articulos = DB::table('articulos')->where('id','=',$id_articulo)->get();
        return view('Inventario/agregar_pedido_ternura',compact('Articulos'));
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

        $this->validate(request(), [
            'id_articulo' => 'required',
            'id_proveedor' => 'required',
            'costo_total' => 'required',
            'estado' => 'required',    
            'cantidad' => 'required',
            'fecha' => 'required',
        ]);


        $id_articulo = $request ->id_articulo;
        $id_proveedor = $request ->id_proveedor;
        $costo_total = $request ->costo_total;
        $estado = $request ->estado;
        $cantidad = $request ->cantidad;
        $fecha = $request ->fecha;


        if ($cantidad < 0){
            return $this->index();
        }else{

             Pedido::create([
            'id_articulo' => $request->id_articulo,
            'id_proveedor' => $request->id_proveedor,
            'costo_total' => $request->costo_total,
            'estado' => $request->estado,
            'cantidad' => $request->cantidad,
            'fecha' => $request->fecha,
            'borrado' => '2',
        ]);    
  
        return $this->index(); 
        }

  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $Articulos = DB::table('articulos')->select('id','precio_basico')->get();
        $pedidos = Pedido::all()->where('borrado', '=', 2);        
        return view('Inventario/actualizar_pedido', compact('pedidos','Articulos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedidos)
    {
        //

        $this->validate(request(), [
            //'id_articulo' => 'required',
            //'id_proveedor' => 'required',
            'costo_total' => 'required',
            'estado' => 'required',    
            'cantidad' => 'required',        
        ]);

        $pedidos = Pedido::find($request->id);

        //$pedidos->id_articulo = $request->id_articulo;
        //$pedidos->id_proveedor = $request->id_proveedor;
        $pedidos->cantidad  = $request->cantidad;        
        $pedidos->costo_total = $request->costo_total;
        $pedidos->estado = $request->estado;

        if ($pedidos->cantidad < 0){
            return $this->edit();
        }else{

            $pedidos->save();

            return $this->index();
        }
    }

    public function delete(Pedido $pedido)
    {
        //
        $pedidos = Pedido::all()->where('borrado', '=', 2);
        return view('Inventario/eliminar_pedido', compact('pedidos'));
    }  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        //
        $pedidos = Pedido::find($request->id);

        $pedidos->borrado = '1';
        
        $pedidos->save();

        return $this->index();
    }

    public function reportesPedidos()
    {
        return view('Inventario/reportes_pedidos');
    }    

    public function reportePedido(Request $request){        
        $valor = $request->estado;

        $consulta = DB::table('pedidos')
                     ->where('estado','=', $valor)                     
                     ->paginate(50);                    
        
        return view('Inventario/resultadoReportePedido', compact('consulta'));
    }
}
