@extends('layouts.app')

@section('titulo')
    Modulo Cliente, Lista de Usuarios

    @if(Session::has('flash_message'))
                <script type="text/javascript">
                  alert("{{Session::get('flash_message')}}");
                </script>
    @endif
    @if (Session::has('deleted'))
     <div class="alert alert-warning" role="alert"> usuario Eliminado, si desea deshacer el cambio <a href="{{ route('restore', [Session::get('deleted')]) }}">Click aqui</a> </div>
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
     <table id="grid" class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Correo</th>
          <th>DNI</th>
          <th>Tipo Rol</th>
          <th>Credito Actual</th>
          <th>Credito Maximo</th>
        </tr>
        </thead>
    @foreach($users as $user)
    @if ($user->tipo_rol!='admin'and $user->tipo_rol!='root')
    <tbody>
        @php
        //$Telefono = App\Models\Usuarios\Telefono::findOrFail($user->id);
      @endphp <tr>
            <td><a href="{{route('Usuario.show',['usuario' => $user->id])}}">{{$user->name}}</a></td>
            <td>{{$user->apellidos}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->id_tipo}}</td>
            <td>{{$user->tipo_rol}}</td>
            <td>{{$user->credito_actual}}</td>
            <td>{{$user->credito_maximo}}</td>
              <td><small class="pull-right">
                  <form action="{{route('Usuario.destroy',['usuario' => $user->id])}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
            </small><small class="pull-right">
                  <a href="{{route ('Usuario.edit',['user' => $user->id])}}" class="btn btn-info">Edit</a>
            </small></td></tr>
          </tbody>
          @endif
    @endforeach
  </table>
</div>
    {{$users->render()}}
@endsection
