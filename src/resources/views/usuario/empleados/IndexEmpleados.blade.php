  @extends('layouts.app')

  @section('titulo')
      Lista Empleados
      @if(Session::has('flash_message'))
                  <script type="text/javascript">
                    alert("{{Session::get('flash_message')}}");
                  </script>
      @endif
      @if (Session::has('deleted'))
   <div class="alert alert-warning" role="alert"> Usuario borrado </div>
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
     <table class="table table-bordered table-condensed ">
        <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Email</th>
          <th>Telefono</th>
          <th>Estado</th>
          <th>Cargo</th>
          <th>Area</th>
          <th>Ver Contrato</th>
        </tr>
        </thead>
	@foreach($Empleados as $empleado)
    @php
      $user=App\Models\Usuarios\User::where('id',$empleado->id_usuario)->firstOrFail();
      $telefono=App\Models\Usuarios\Telefono::findOrFail($user->id);
    @endphp
    <tbody><tr>
              <td><a href="{{route('Usuario.show',['usuario' => $empleado->id_empleado])}}">{{$user->name}}</a></td>
              <td>{{$user->apellidos}}</td>
              <td>{{$user->email}}</td>
              <td>{{$telefono->telefono}}</td>
              <td>{{$empleado->estado}}</td>
              <td>{{$empleado->cargo}}</td>
              <td>{{$empleado->area}}</td>
                <td><small class="pull-right">
                  <a href="{{route ('Contrato.show',['contrato'=>$empleado->id_contrato])}}" class="btn btn-info">Ver</a>
                </td><td></small>
                    <small class="pull-right">
              <form action="{{route('Empleado.destroy',['empleado' => $empleado->id_empleado])}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-danger">Delete</button>
              </form></small><small class="pull-right">
                  <a href="{{route ('Empleado.edit',['empleado' => $empleado->id_empleado])}}" class="btn btn-info">Edit</a>
            </small></td></tr>
          </tbody>
    @endforeach
  </table>
</div>
    {{$Empleados->render()}}
@endsection
