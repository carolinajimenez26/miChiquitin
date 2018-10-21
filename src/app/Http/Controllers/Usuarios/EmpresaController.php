<?php

namespace App\Http\Controllers\Usuarios;

use App\Models\Usuarios\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresa = Empresa::all();
        return view('usuario.empresa.IndexEmpresa',['empresas'=>$empresa]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Empresa $empresa)
    {

    }

    public function edit($id)
    {
      //var_dump($id);
      $empresa = Empresa::findOrFail($id);
      return view('usuario.empresa.EditEmpresa',['empresa'=>$empresa]);
    }

    public function update(Request $request, $id)
    {
      $empresa = Empresa::findOrFail($id);
        $empresa->update($request->all());
        return redirect()->route('Empresa.index');
    }

    public function destroy(Empresa $empresa)
    {

    }
}
