<?php

namespace App\Http\Controllers\Usuarios;
use App\Models\Usuarios\User;
//use App\Models\Usuarios\Session;
use App\Models\Usuarios\Cliente;
use App\Models\Usuarios\Empleado;
use App\Models\Usuarios\Contrato;
use App\Models\Usuarios\Telefono;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
class UsuarioController extends Controller
{
    public function index()
    {
      $users = User::orderBy('name', 'asc')->paginate(10);
      return view('usuario.user.IndexUsers')->with(['users'=>$users]);
    }

    public function credito(Request $request){ //funcion para el reporte por genero
      $users = User::credito((float)$request->cre_min,(float)$request->cre_max)->orderBy('credito_actual','asc')->paginate(30); //query da un array
      if(count($users)>0){
        return view('usuario.user.IndexUsers',['users'=>$users]);
      }else{
        Session::flash('error_filtro', 'Busqueda no encontrada');
        return redirect()->back();
      }
    }

    public function creditomax(Request $request){ //funcion para el reporte por genero
      $users = User::creditomax((float)$request->cre_min,(float)$request->cre_max)->orderBy('credito_maximo','asc')->paginate(30); //query da un array
      if(count($users)>0){
        return view('usuario.user.IndexUsers',['users'=>$users]);
      }else{
        Session::flash('error_filtro', 'Busqueda no encontrada');
        return redirect()->back();
      }
    }

    public function indexname(Request $request){  //arreglando filtro name, busquedas por nombre parciales
      $users = User::name($request->name)->orderBy('id','desc')->paginate(10); //query da un array
      if (count($users)>0)
      {
          return view('usuario.user.IndexUsers')->with(['users'=>$users]);
      }else{
        Session::flash('flash_message', 'Busqueda no encontrada');
        return redirect()->back();
      }
    }

    public function acceso(){   //acceso users
      $user =  User::acceso()->orderBy('last_login','desc')->paginate(10);
      return view('usuario.filtros.IndexAcceso',['users'=>$user]);   //vistas de acceso, reporte
    }

    public function correo(Request $request){   //buscar por correo
      $v = \Validator::make($request->all(), [
          'correo'    => 'email',
      ]);
      $usuario =  User::where('email',$request->correo)->first();
      if ($v->fails())
      {
        return redirect()->back()->withInput()->withErrors($v->errors());
      }
      if(!empty($usuario)){
        return view('usuario.user.ShowUser',compact('usuario'));
      }
      else{ Session::flash('error_filtro', 'Busqueda no encontrada');return redirect()->back();
      }
    }  //buscar por correo

    public function indextrash(){
        $user = User::onlyTrashed()->orderBy('deleted_at','desc')->paginate(10);
        return view('usuario.user.Indextrash')->with(['users'=>$user]);
    }

    public function restore($id)
    {
      $user = User::withTrashed()->where('id', '=', $id)->first();
       if($user->tipo_rol=='cliente'){
          $user = User::withTrashed()->where('id', '=', $id)->first();
          $cliente = Cliente::withTrashed()->where('id_usuario',$id)->firstOrFail();
          $telefono= Telefono::withTrashed()->findOrFail($user->id);
          $user->restore();
          $cliente->restore(); //agregar sofdelete
          $telefono->restore();
        }
        if($user->tipo_rol=='empleado'){
          $empleado=Empleado::withTrashed()->where('id_usuario',$user->id)->firstOrFail();
          $contrato=Contrato::withTrashed()->findOrFail($empleado->id_contrato);
          $telefono= Telefono::withTrashed()->findOrFail($user->id);
          $user->restore();
          $contrato->restore();
          $telefono->restore();
          $empleado->restore();
        }
        Session::flash('flash_message', 'Usuario Restaurado');
        return redirect()->route('Usuario.index');
    }

    public function show($id)
    {
      $usuario=User::findOrFail($id);
      return view('usuario.user.ShowUser',compact('usuario'));
    }

    public function edit($id)
    {
    $user=User::findOrFail($id);
    if($user->tipo_rol=='cliente'){
      $cliente = Cliente::where('id_usuario',$id)->firstOrFail();
          return redirect()->route('Cliente.edit',['cliente'=>$cliente->id_cliente]);
      }else{
      $Empleado = Empleado::where('id_usuario',$user->id)->firstOrFail();
          return redirect()->route('Empleado.edit',['empleado'=>$Empleado->id_empleado]);
      }
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy($id)
    {
      $user = User::findOrFail($id);
      if($user->tipo_rol == 'cliente'){
        $cliente = Cliente::where('id_usuario',$id)->firstOrFail();
        $telefono= Telefono::findOrFail($user->id);
        $cliente->delete(); //agregar sofdelete
        $user->delete();
        $telefono->delete();
      }
      if($user->tipo_rol=='empleado'){
        $empleado=Empleado::where('id_usuario',$user->id)->firstOrFail();
        $contrato=Contrato::findOrFail($empleado->id_contrato);
        $telefono= Telefono::findOrFail($user->id);
        $empleado->delete();
        $contrato->delete();
        $user->delete();
        $telefono->delete();
      }
      Session::flash('deleted', 'Usuario Eliminado');
      return redirect()->route('Usuario.index')->with("deleted" , $id );
    }
}
