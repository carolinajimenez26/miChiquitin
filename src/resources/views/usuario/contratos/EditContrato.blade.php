@extends('layouts.app')

@section('titulo')

@endsection

@section('content')

  {!!Form::open(['route' => ['Contrato.update','contrato' => $contrato->id_contrato], 'method'=>'POST'])!!}
  {{ method_field('PUT') }}
  {{csrf_field()}}
  <div class="container">

    <div class="row">
      <div class="col-md-7 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Contrato de {{$usuario->name}}</div>
          <div class="panel-body">
            <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
              {!!form::label('tipo contrato: ')!!}<br>
              {!!form::text('tipo',$contrato->tipo,['class'=>'col-lx-6 col-md-6', 'placeholder'=>'assistent','autofocus required'])!!}
            </div>
            <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
              {!!form::label('Salario: ')!!}<br>
              {!!form::text('salario',$contrato->salario,['class'=>'col-lx-6 col-md-6','autofocus required'])!!}
            </div>
            <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
              {!!form::label('fecha_inicial: ')!!}<br>
              {!!form::date('fecha_inicial',$contrato->fecha_inicial,['class'=>'col-lx-6 col-md-6','autofocus required'])!!}
            </div>
            <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
              {!!form::label('fecha_final: ')!!}<br>
              {!!form::date('fecha_fin',$contrato->fecha_fin,['class'=>'col-lx-6 col-md-6','autofocus required'])!!}
            </div>
          </div>  <div class="form-group">
            {!!form::submit('Registrar',['class'=>'btn btn-primary'])!!}
            {!!form::reset('Cancelar',['class'=>'btn btn-boton'])!!}
            {!!form::close()!!}
          </div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
@endsection
