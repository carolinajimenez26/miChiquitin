@extends('layouts.app')

@section('titulo')
  Editar Informacion de la Empresa {{$empresa->nombre}}
@endsection

@section('content')

  @if( $empresa->exists )
    {!!Form::open(['route' => ['Empresa.update','empresa' => $empresa->id_empresa], 'method'=>'POST'])!!}
    {{ method_field('PUT') }}
  @else <!--para crear nuevas sucursales -->
    {!!Form::open(['route'=>['Empresa.store'], 'method'=>'POST'])!!}
  @endif
  {{csrf_field()}}
  <div class="container">

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Informacion de la empresa </div>
          <div class="panel-body">
            <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
              {!!form::label('Nombre: ')!!}<br>
              {!!form::text('name',$empresa->nombre,['class'=>'col-lx-6 col-md-6', 'autofocus required'])!!}
            </div>
            <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">              {!!form::label('Direccion: ')!!}<br>
              {!!form::text('direccion',$empresa->direccion,['class'=>'col-lx-6 col-md-6','autofocus required'])!!}
            </div>
            <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
              {!!form::label('Telefono: ')!!}<br>
              {!!form::tel('telefono',$empresa->telefono,['class'=>'col-lx-6 col-md-6','autofocus required'])!!}
            </div><div class="form-group">
              {!!form::submit('Registrar',['class'=>'btn btn-primary'])!!}
              {!!form::reset('Cancelar',['class'=>'btn btn-boton'])!!}
              {!!form::close()!!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
@endsection
