
@extends('layouts.app')

@section('titulo')
        Modulo Cliente, Todos los clientes
        @if(Session::has('flash_message'))
          <script type="text/javascript">
            alert("{{Session::get('flash_message')}}");
          </script>
        @endif
        @if (Session::has('deleted'))
     <div class="alert alert-warning" role="alert"> Usuario borrado,</div>
   @endif
@endsection

  @section('content')
    <a href="{{route('Usuario.index')}}" class="btn btn-info">Todos los Usuarios</a>
    <a href="{{route('Cliente.index')}}" class="btn btn-info">Todos los Clientes</a>
     <a href="{{route('Empleado.index')}}" class="btn btn-info">Todos los Empleados</a>
     <a href="{{route('Contrato.index')}}" class="btn btn-info">Todos los  Contratos</a>
     <small class="pull-right">
     <form class="form-row align-items-center"  action="{{route('name',['name' => "name"])}}" method="get">
         <input type="text" class="col-md-8 col-lx-8 col-lg-8 col-sm-8" name="name" placeholder="Buscar Nombre" autofocus required/>
        <button type="submit" class="btn btn-primary text center">Buscar</button>
     </form></small>
     
    <div class="container">
    <table class="table table-bordered table-condensed">
        <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Email</th>
          <th>Ciudad</th>
          <th>Telefono</th>
          <th>Credito Maximo</th>
          <th>Credito Actual</th>
        </tr>
        </thead>
	@foreach($clientes as $cliente)
        <tbody>
            @php
              $user = App\Models\Usuarios\User::findOrFail($cliente->id_usuario);
              $Telefono = App\Models\Usuarios\Telefono::findOrFail($cliente->id_usuario);
            @endphp<tr>
            <td><a href="{{route('Cliente.show',['cliente' => $cliente->id_cliente])}}">{{ $user->name}}</a>
            </td>
            <td>{{$user->apellidos}}</td>
            <td>{{$user->email}}</td>
            <td>{{$cliente->ciudad}}</td>
              <td>{{$Telefono->telefono}}</td>
              <td>{{$user->credito_maximo}}</td>
              <td>{{$user->credito_actual}}</td><td>
            <small class="pull-right">
              <form action="{{route('Cliente.destroy',['cliente' => $cliente->id_cliente])}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </small><small class="pull-right">
              <a href="{{route ('Cliente.edit', $cliente->id_cliente)}}" class="btn btn-info">Edit</a>
            </small></td></tr>
          </tbody>
    @endforeach
    </table>
    </div>
    {{$clientes->render()}}
@endsection
