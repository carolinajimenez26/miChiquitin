<?php

namespace App\Http\Controllers\Cartera;

use Illuminate\Http\Request;
use App\Models\Cartera\Pago;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Cartera\Paz_y_salvo;
use App\Models\Cartera\Deuda;
use App\Models\Usuarios\User;
use PDF;


use Session;

class PagoController extends Controller
{
    public function index(Request $request){
       if($request){
            $query=$request->get('searchText');
            if (is_null($query)){
                $pagos = Pago::all();    
            }else{
                $user_id = User::where('id_tipo', $query)->first()->id;
                $deudas = Deuda::where('id_usuario',$user_id)->first()->id;
                $pagos = Pago::where('id_deuda',$deudas)->get();
            }            
             return view('cartera.pago.index',["pagos"=>$pagos,'searchText'=>$query]);
       }
    

    }      
    

    public function show(Request $request){
        $paz=Paz_y_salvo::all();
        return view('cartera.pago.show',["paz"=>$paz]);
              

    }

    public function downloadPDF(Request $request, $id){
        if($request){
            $paz = Paz_y_salvo::where('id_paz_y_salvo', $id)->get();

             $pdf = PDF::loadView('cartera/pago/pdf',['paz'=>$paz]);
             return $pdf->download('Paz_y_Salvo.pdf');
       }   
 
    }




}