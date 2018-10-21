@extends('layouts.app')

@section('titulo')
    Lista de Clientes por
    @endsection

@section('content')
  <div class="container">
  <table class="table table-bordered table-condensed ">
        <thead>
          <tr>

          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Correo</th>
          <th>Telefono</th>
          <th>Genero</th>
          <th>Ciudad</th>
        </tr>
        </thead>
    @foreach($clientes as $cliente)
    <tbody>
      <tr>
        @php
          $user = App\Models\Usuarios\User::findOrFail($cliente->id_cliente);
        @endphp
        @if ($user->tipo_rol!='root' and $user->tipo_rol!='admin')@php
            $Telefono = App\Models\Usuarios\Telefono::findOrFail($user->id);
      @endphp
            <td><a href="{{route('Usuario.show',['usuario' => $user->id])}}">{{$user->name}}</a></td>
            <td>{{$user->apellidos}}</td>
            <td>{{$user->email}}</td>
            <td>{{$Telefono->telefono}}</td>
            <td>{{$cliente->genero}}</td>
              <td>{{$cliente->ciudad}}
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
