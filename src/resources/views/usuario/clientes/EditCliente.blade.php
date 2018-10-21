@extends('layouts.app')

@section('titulo')
     Editar Cliente {{$usuario->name}} {{$usuario->apellidos}}
@endsection
  @section('content')

    {!!Form::open(['route' => ['Cliente.update', 'cliente' => $cliente->id_cliente], 'method'=>'POST'])!!}
    {{ method_field('PUT') }}
    {{csrf_field()}}
    <div class="container">

      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Editar Un Cliente</div>
            <div class="panel-body">
              <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                {!!Form::open(['route'=>['Cliente.store'], 'data-toggle'=>'validator', 'role'=>'form', 'method'=>'POST'])!!}
                {{csrf_field()}}
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('name', 'Nombre: ')!!}<br>
                  {!!form::text('name',$usuario->name,['class'=>'col-lx-6 col-md-6', 'placeholder'=>'your name','autofocus required'])!!}
                </div>
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('apellidos','Apellidos: ')!!}<br>
                  {!!form::text('apellidos',$usuario->apellidos,['class'=>'col-lx-6 col-md-6','placeholder'=>'your lastname','autofocus required'])!!}
                </div>
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('edad','Edad: ')!!}<br>
                  {!!form::number('edad',$usuario->edad,['class'=>'col-lx-6 col-md-6','min'=>'18','max'=>'99','autofocus required'])!!}
                </div>
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('email', 'Email: ')!!}<br>
                  {!!form::email('email',$usuario->email,['class'=>'col-lx-6 col-md-6','placeholder'=>'nombre@mozilla.com','autofocus required'])!!}
                </div>
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('telefono', 'Telefono: ')!!}<br>
                  {!!form::tel('telefono',$telefono->telefono,['class'=>'col-lx-6 col-md-6','minlenght'=>'7','placeholder'=>'your numberphone','autofocus required'])!!}
                </div>
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('direccion','Direccion: ')!!}<br>
                  {!!form::text('direccion',$usuario->direccion,['class'=>'col-lx-6 col-md-6', 'placeholder'=>'your address','autofocus required'])!!}
                </div>
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('genero','Genero: ')!!}<br>
                  {!! Form::select('genero',['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], $cliente->genero, ['class'=>'col-lx-6 col-md-6','autofocus required'])!!}
                </div>
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('ciudad','Ciudad: ')!!}<br>
                  {!!form::text('ciudad',$cliente->ciudad,['class'=>'col-lx-6 col-md-6','placeholder'=>'your city','autofocus required'])!!}
                </div>
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('credito_maximo','Credito Maximo: ')!!}<br>
                  {!!form::number('credito_maximo',$usuario->credito_maximo,['class'=>'col-lx-6 col-md-6','min'=>'0','max'=>'10000000','autofocus required'])!!}
                  <!--!!form::selectRange('credito_maximo',0,900, $usuario->credito_maximo, ['class'=>'col-lx-6 col-md-6','autofocus required'])!!}-->
                </div>
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('credito_actual','Credito Actual : ')!!}<br>
                  {!!form::number('credito_actual',$usuario->credito_actual,['class'=>'col-lx-6 col-md-6','min'=>'0','max'=>'10000000','autofocus required'])!!}
                  <!--!!form::selectRange('credito_actual', 0, 900, $usuario->credito_actual,['class'=>'col-lx-6 col-md-6','autofocus required'])!!}-->
                </div>
              </div>
              <div class="form-group">
                {!!form::submit('Registrar',['class'=>'btn btn-primary'])!!}
                {!!form::reset('Cancelar',['class'=>'btn btn-boton'])!!}
                {!!form::close()!!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
@endsection
