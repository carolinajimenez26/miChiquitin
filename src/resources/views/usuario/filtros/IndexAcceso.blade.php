@extends('layouts.app')

@section('titulo')

    @endsection

@section('content')

  <div class="container">
  <table class="table table-bordered table-condensed ">
        <thead>
          <tr>

          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Correo</th>
          <th>Rol</th>
          <th>Ultimo Acceso</th>
        </tr>
        </thead>
    @foreach($users as $user)
    <tbody>
      <tr>

      <td>{{$user->name}}</td>
            <td>{{$user->apellidos}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->tipo_rol}}</td>
            <td>{{$user->last_login}}</td>
          </tr>
          </tbody>
    @endforeach
  </table>
{{$users->render()}}
</div>
@endsection
