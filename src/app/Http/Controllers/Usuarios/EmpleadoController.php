<?php

namespace App\Http\Controllers\Usuarios;
use App\Models\Usuarios\User;
use App\Models\Usuarios\Contrato;
use App\Models\Usuarios\Empresa;
use App\Models\Usuarios\Telefono;
use App\Models\Usuarios\Empleado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Mail\enviar;
use Mail;
use Session;
class EmpleadoController extends Controller
{

    public function index()
    {
        $empleados = Empleado::orderBy('id_empleado', 'desc')->paginate(10);
        return view('usuario.empleados.IndexEmpleados')->with(['Empleados'=>$empleados]);
    }

    public function create()
    {
      return view('usuario.empleados.CreateEmpleado');
    }

    public function store(Request $request)
    {
      $v = \Validator::make($request->all(), [
          'name' => 'required',
          'apellidos' => 'required',
          'email'    => 'required|email|unique:users',
          'telefono' => 'required|numeric|min:7',
          'salario' => 'required|numeric',
      ]);
      if ($v->fails())
      {
        return redirect()->back()->withInput()->withErrors($v->errors());
      }else{
          $data = $request->all();
          $data['tipo_rol'] = 'empleado';
          $data['estado'] = 'activo';
          $data['password'] = Hash::make('secret');
          $data['confirmation_password'] = Hash::make($data['password']);
          $Usuario= User::create($data);
          $contrato = Contrato::create($data);
          $data['id_usuario'] = $Usuario->id;
          $Telefono= Telefono::create($data);
          $data['id_empresa'] = 1; //id de la unica empresa registrada en el seed
          $data['id_contrato'] = $contrato->id_contrato; //hay algo mal en el modelo o tabla, solucionado  --rename pk en el modelo
          $Empleado = Empleado::create($data);
          Mail::raw('$Usuario->email', function ($message) {   //funcion para enviar al correo del empleado la clave, por ahora crea un log
          echo 'welcome tu contraseña es $data[password]';
          });
          Session::flash('flash_message', 'Registro Exitoso');
          return redirect()->route('Empleado.index');
        }
    }

    public function show($id)
    {
      $empleado = Empleado::findOrFail($id); //primary id_cleinte
      return redirect()->route('Usuario.show',['usuario'=>$empleado->id_usuario]);
    }

    public function edit($id)
    {
    //   var_dump($id);
      $empleado = Empleado::findOrFail($id);
      $user=User::findOrFail($empleado->id_usuario);
      $contrato=Contrato::findOrFail($empleado->id_contrato);
      $telefono=Telefono::findOrFail($empleado->id_usuario);
      return view('usuario.empleados.EditEmpleado',['empleado'=>$empleado,'contrato'=>$contrato,'telefono'=>$telefono,'usuario'=>$user]);
    }

    public function update(Request $request, $id)
    {
        $empleado=Empleado::findOrFail($id);
        $user=User::findOrFail($empleado->id_usuario);
        $contrato=Contrato::findOrFail($empleado->id_contrato);
        $telefono=Telefono::findOrFail($empleado->id_usuario);
        $empleado->update($request->all());
        $telefono->update($request->all());
        $contrato->update($request->all());
        $user->update($request->except(['email']));
        return redirect()->route('Empleado.show',['Empleado'=>$empleado->id_empleado]);
    }

    public function destroy($id) //recibe id_empleado
    {
        $empleado=Empleado::findOrFail($id);
        $user=User::findOrFail($empleado->id_usuario);
        $contrato=Contrato::findOrFail($empleado->id_contrato);
        $telefono= Telefono::findOrFail($user->id);
        $empleado->delete();
        $contrato->delete();
        $user->delete();
        $telefono->delete();
        Session::flash('deleted', 'Usuario Eliminado');
        return redirect()->route('Empleado.index')->with("deleted" , $id );
    }
}
