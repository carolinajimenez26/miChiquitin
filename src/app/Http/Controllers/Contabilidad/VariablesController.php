<?php

namespace App\Http\Controllers\Contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contabilidad\Varcontrol;
use Illuminate\Support\Facades\Auth;

class VariablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->email == 'root@gmail.com') abort(403);
       $varcontrl = Varcontrol::all();
       //dd($varcontrl);
       return view('Contabilidad.varcontrol.index',compact('varcontrl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view('Contabilidad.varcontrol.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //return $request->all();
      $this->validate($request, [
        'nombre' => 'required|unique:varcontrols|max:255',
        'valor' =>'required',
      ]);

      $varcon=Varcontrol::create([
        'nombre' => $request->get('nombre'),
        'descripcion' =>$request->get('descripcion'),
        'valor'=>$request->get('valor')
      ]);

      $menssage= $varcon ? 'variable agregada correctamente' : 'la variable NO pudo agregarse';

      return redirect()->route('varcontr.index')->with('message', $menssage);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Varcontrol $Varcontrol)
    {
       return $Varcontrol;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Varcontrol $Varcontrol)
    {
        return view('Contabilidad.varcontrol.edit', compact('Varcontrol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Varcontrol $Varcontrol)
    {
        $Varcontrol->fill($request->all());

        $updated = $Varcontrol->save();
        $message = $updated ? 'Variable actualizada correctamente' : 'La variable NO fue actualizada';
        return redirect()->route('varcontr.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Varcontrol $Varcontrol)
    {
        $delete = $Varcontrol->delete();

        $message = $delete ? 'Variable eliminada correctamente' : 'la variable NO fue elminada';

        return redirect()->route('varcontr.index')->with('message', $message);
    }
}
