@extends('layouts.app')

@section('titulo')
    Modulo Cliente, Lista de Usuarios
    @if(Session::has('flash_message'))
                <script type="text/javascript">
                  alert("{{Session::get('flash_message')}}");
                </script>
    @endif
    @endsection

@section('content')
  <div class="container">
  <table class="table table-bordered table-condensed ">
        <thead>
          <tr>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Correo</th>
          <th>Tipo Rol</th>
          <th>Hora eliminado</th>
    </tr>
        </thead>
    @foreach($users as $user)
    <tbody><tr>

            <td>{{$user->name}}</td>
            <td>{{$user->apellidos}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->tipo_rol}}</td>
              <td>{{$user->deleted_at}}</td>
              <!--<td>{Auth::user()->name}}-->
              <small class="pull-right">
                <td> <a href="{{ route('restore', ['usuario'=>$user->id]) }}" class="btn btn-danger btn-xs">Restore</a>
                </small></td>
              </tr>
          </tbody>
    @endforeach
  </table>
</div>
    {{$users->render()}}
@endsection
