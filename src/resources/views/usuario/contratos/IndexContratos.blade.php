@extends('layouts.app')

@section('titulo')
    Lista Contratos
    @endsection

@section('content')
  @if(Session::has('flash_message'))
    <script type="text/javascript">
      alert("{{Session::get('flash_message')}}");
    </script>
  @endif
  <a href="{{route('Usuario.index')}}" class="btn btn-info">Todos los Usuarios</a>
  <a href="{{route('Cliente.index')}}" class="btn btn-info">Todos los Clientes</a>
   <a href="{{route('Empleado.index')}}" class="btn btn-info">Todos los Empleados</a>
   <a href="{{route('Contrato.index')}}" class="btn btn-info">Todos los  Contratos</a>
   <div class="container">
   <table class="table table-bordered table-condensed ">
        <thead>
          <tr>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Tipo</th>
          <th>Salario</th>
          <th>Fecha inicial</th>
          <th>Fecha final</th>
        </tr>
        </thead>
	@foreach($contratos as $contrato)
        <tbody>
          @php
            $Empleado = App\Models\Usuarios\Empleado::where('id_contrato',$contrato->id_contrato)->firstOrFail();
            $usuario= App\Models\Usuarios\User::findOrFail($Empleado->id_usuario);
          @endphp <tr>
            <td><a href="{{route('Contrato.show',['contrato' => $contrato->id_contrato])}}">{{$usuario->name}}</a>
              <td>{{$usuario->apellidos}}</td>
              <td>{{$contrato->tipo}}</td>
              <td>{{$contrato->salario}}</td>
              <td>{{$contrato->fecha_inicial}}</td>
              <td>{{$contrato->fecha_fin}}
        <small class="pull-right">
              <a href="{{route ('Contrato.edit',['contrato' => $contrato->id_contrato])}}" class="btn btn-info">Edit</a>
            </small></td></tr>
          </tbody>
    @endforeach
  </table>
</div>
    {{$contratos->render()}}
@endsection
