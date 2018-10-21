<?php

namespace App\Http\Controllers\Cartera;

use App\Models\Cartera\Plan_de_pago;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;

class Plan_de_pagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $planes = Plan_de_pago::all();
        return view('cartera.plan_de_pago.index', compact('planes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cartera.plan_de_pago.create');
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
        $rules = array(
          'nombre_plan' => 'required',
          'cuotas' => 'required',
          'valor_cuota' => 'required',
          'interes' => 'required',
          'forma_pago' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return Redirect::to('plan_de_pago/create')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
        } else {
            // store
            $plan_de_pago = new plan_de_pago;
            $plan_de_pago->nombre_plan  = Input::get('nombre_plan');
            $plan_de_pago->cuotas = Input::get('cuotas');
            $plan_de_pago->valor_cuota = Input::get('valor_cuota');
            $plan_de_pago->interes = Input::get('interes');
            $plan_de_pago->forma_pago = Input::get('forma_pago');
            $plan_de_pago->save();

            // redirect
            Session::flash('message', 'Plan de pago creado!');
            return Redirect::to('plan_de_pago');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cartera\Plan_de_pago  $plan_de_pago
     * @return \Illuminate\Http\Response
     */
    public function show(Plan_de_pago $plan_de_pago)
    {
        //
        $plan = Plan_de_pago::find($plan_de_pago->id_plan_de_pago);
        
        return view('cartera.plan_de_pago.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cartera\Plan_de_pago  $plan_de_pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan_de_pago $plan_de_pago)
    {
        //
        $plan = Plan_de_pago::find($plan_de_pago->id_plan_de_pago);
        
        return view('cartera.plan_de_pago.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cartera\Plan_de_pago  $plan_de_pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan_de_pago $plan_de_pago)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
          'nombre_plan' => 'required',
          'cuotas' => 'required',
          'valor_cuota' => 'required',
          'interes' => 'required',
          'forma_pago' => 'required',
        );
          $validator = Validator::make(Input::all(), $rules);

          // process the login
          if ($validator->fails()) {
              return Redirect::to('plan_de_pago/' . $plan_de_pago->id_plan_de_pago . '/edit')
                  ->withErrors($validator)
                  ->withInput(Input::except('password'));
          } else {
              // store
              $plan_de_pago = Plan_de_pago::find($plan_de_pago->id_plan_de_pago);
              $plan_de_pago->nombre_plan  = Input::get('nombre_plan');
              $plan_de_pago->cuotas = Input::get('cuotas');
              $plan_de_pago->valor_cuota = Input::get('valor_cuota');
              $plan_de_pago->interes = Input::get('interes');
              $plan_de_pago->forma_pago = Input::get('forma_pago');
              $plan_de_pago->save();

              // redirect
              Session::flash('message', 'Plan de pago actualizado!');
              return Redirect::to('plan_de_pago');
          }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cartera\Plan_de_pago  $plan_de_pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan_de_pago $plan_de_pago)
    {
        //
        // delete
        $plan = Plan_de_pago::find($plan_de_pago->id_plan_de_pago);
        $plan->delete();

        // redirect
        Session::flash('message', 'Plan de pago eliminado!');
        return Redirect::to('plan_de_pago');
    }
}
