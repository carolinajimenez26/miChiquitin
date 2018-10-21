@extends('layouts.app')

@section('titulo')

@endsection

@section('content')
  @php
  $telefono = App\Models\Usuarios\Telefono::findOrFail($usuario->id);
  @endphp
  @if(Session::has('flash_message'))
    <script type="text/javascript">
      alert("{{Session::get('flash_message')}}");
    </script>
  @endif
  <div class="col-sm-8 col-xs well">
    <div class="panel panel-info">
      <div class="panel-heading">
        <p class="panel-title "> Viendo al {{$usuario->tipo_rol}} {{$usuario->name}} {{$usuario->apellidos}}</p>
      </div>
      <div class="panel body">
        <dl>
          <dt class="bg-success">Nombre: </dt>
          <dd>- {{$usuario->name}}</dd>
          <dt class="bg-success">Apellidos: </dt>
          <dd>- {{$usuario->apellidos}}</dd>
          <dt class="bg-success">Email: </dt>
          <dd>- {{$usuario->email}}</dd>
          <dt class="bg-success">Direccion:</dt>
          <dd>- {{$usuario->direccion}}  </dd>
          <dt class="bg-success">Telefono: </dt>
          <dd>- {{$telefono->telefono}} </dd>
          <dt class="bg-success">Edad: </dt>
          <dd>- {{$usuario->edad}}  </dd>
          <dt class="bg-success">Tipo Rol:</dt>
          <dd>- {{$usuario->tipo_rol}}</dd>

          @if ($usuario->tipo_rol=='cliente')      @php
          $cliente=App\Models\Usuarios\Cliente::where('id_usuario',$usuario->id)->firstOrFail();
          @endphp
          <dt class="bg-success">Ciudad:  </dt>
          <dd>- {{$cliente->ciudad}}</dd>
          <dt class="bg-success">Genero:  </dt>
          <dd>- {{$cliente->genero}}</dd>
          <dt class="bg-success">Credito Actual:  </dt>
          <dd>- {{$usuario->credito_actual}}</dd>
          <dt class="bg-success">Credito Maximo:  </dt>
          <dd>- {{$usuario->credito_maximo}}<dd>
          @elseif ($usuario->tipo_rol=='empleado')
            @php
            $empleado=App\Models\Usuarios\Empleado::where('id_usuario',$usuario->id)->firstOrFail();
            @endphp
            <dt class="bg-success">Estado: </dt>
            <dd>- {{$empleado->estado}}</dd>
            <dt class="bg-success">Cargo: </dt>
            <dd>- {{$empleado->cargo}}</dd>
            <dt class="bg-success">Area: </dt>
            <dd>- {{$empleado->estado}}</dd>
          @endif
          <p> <small class="pull-right">
            <a href="{{route ('Usuario.edit',['user' => $usuario->id])}}" class="btn btn-info">Edit</a>
          </small></p>
        </dl>
      </div></div>
    </div>

  @endsection
