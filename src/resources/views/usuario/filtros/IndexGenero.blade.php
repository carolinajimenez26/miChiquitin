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
          <th>DNI</th>
          <th>Ciudad</th>
          <th>Genero</th>
        </tr>
        </thead>
    @foreach($clientes as $cliente)
    <tbody>
      <tr>
      @php
      $user = App\Models\Usuarios\User::findOrFail($cliente->id_cliente);
      @endphp

      @if ($user->tipo_rol!='root' and $user->tipo_rol!='admin')
      
            <td><a href="{{route('Usuario.show',['usuario' => $user->id])}}">{{$user->name}}</a></td>
            <td>{{$user->apellidos}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->id_tipo}}</td>
            <td>{{$cliente->ciudad}}</td>
            <td>{{$cliente->genero}}
              <small class="pull-right">
                  <a href="{{route ('Usuario.edit',['user' => $user->id])}}" class="btn btn-info">Edit</a>
            </small></td>
          </tr>
          </tbody>
        @endif
    @endforeach
  </table>
  {{$clientes->render()}}
</div>
@endsection
