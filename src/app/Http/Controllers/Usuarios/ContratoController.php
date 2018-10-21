<?php

namespace App\Http\Controllers\Usuarios;

use App\Models\Usuarios\Contrato;
use App\Models\Usuarios\Empleado;
use App\Models\Usuarios\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContratoController extends Controller
{
    public function index()
    {
        $contrato = Contrato::orderBy('id_contrato', 'desc')->paginate(10);
        return view('usuario.contratos.IndexContratos',['contratos'=>$contrato]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
      $contrato=Contrato::findOrFail($id);
      $empleado = Empleado::where('id_contrato',$contrato->id_contrato)->firstOrFail();
      $usuario = User::findOrFail($empleado->id_usuario);
      return view('usuario.contratos.ShowContrato',['contrato'=>$contrato,'empleado'=>$empleado,'usuario'=>$usuario]);
    }

    public function edit($id)
    {
            $Contrato=Contrato::findOrFail($id);$empleado = Empleado::where('id_contrato',$Contrato->id_contrato)->firstOrFail();
            $usuario = User::findOrFail($empleado->id_usuario);
            return view('usuario.contratos.EditContrato',['contrato'=>$Contrato,'usuario'=>$usuario]);
      }

    public function update(Request $request, $id)
    {
        $contrato=Contrato::findOrFail($id);        
        $contrato->update($request->all());
        return redirect()->route('Contrato.index');
    }

    public function destroy(Contrato $contrato)
    {
        //
    }
}
