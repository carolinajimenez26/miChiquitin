<?php

namespace App\Http\Controllers\Usuarios;

use App\Models\Usuarios\Cliente;
use App\Models\Usuarios\Telefono;
use App\Models\Usuarios\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Session;
class ClienteController extends Controller
{
    public function index()
    {
       $clientes = Cliente::orderBy('id_cliente', 'desc')->paginate(10);
       return view('usuario.clientes.IndexClientes', ['clientes'=>$clientes]);
    }

    public function ciudades()
    {
       $clientes = Cliente::orderBy('ciudad','desc')->paginate(10);
       return view('usuario.filtros.IndexCiudades', ['clientes'=>$clientes]);
    }

    public function ciudad(Request $request){
      $clientes =  Cliente::all()->where('ciudad', $request->ciudad);
      return view('usuario.filtros.IndexCiudad',['clientes'=>$clientes]);
    }

    public function genero(Request $request){
      $clientes = Cliente::all()->where('genero', $request->genero);
      return view('usuario.filtros.IndexGenero',['clientes'=>$clientes]);
    }

    public function create()
    {
      return view('usuario.clientes.CreateCliente');
    }

    public function store(Request $request)
    {
      $data = $request->all();
      $data['tipo_rol'] = 'cliente';
      $data['password'] = Hash::make(rand(0,10));
      $data['confirmation_password'] = Hash::make($data['password']);
      $Usuario= User::create($data);
      $data['id_usuario'] = $Usuario->id;
      $Cliente= Cliente::create($data);
      $Telefono= Telefono::create($data);
      Session::flash('flash_message', 'Registro Exitoso');
      return redirect()->route('Cliente.index');
    }

    public function show($id)
    {
      $cliente = Cliente::findOrFail($id); //primary id_cleinte
      return redirect()->route('Usuario.show',['usuario'=>$cliente->id_usuario]);
    }

    public function edit($id)
    {
      $cliente = Cliente::findOrFail($id);
      $usuario = User::findOrFail($cliente->id_usuario);
      $Telefono= Telefono::findOrFail($id);
      return view('usuario.clientes.EditCliente', ['cliente' => $cliente, 'usuario' => $usuario, 'telefono' => $Telefono]);
    }

    public function update (Request $request, $id) //incompleto
    {
        $cliente = Cliente::findOrFail($id);
        $user = User::findOrFail($cliente->id_usuario);
        $telefono= Telefono::findOrFail($user->id);
        $cliente->update($request->all());
        $user->update($request->except(['email']));
        $telefono->update($request->all());
        return redirect()->route('Cliente.show',['cliente'=>$cliente->id_cliente]);
    }

    public function destroy($id) //recibe id_cliente
    {
          $cliente = Cliente::findOrFail($id);
          $user=User::findOrFail($cliente->id_usuario);
          $telefono= Telefono::findOrFail($user->id);
          $cliente->delete(); //agregar sofdelete
          $user->delete();
          $telefono->delete();
          Session::flash('flash_message', 'Usuario Eliminado');
          return redirect()->route('Cliente.index');
    }
}
