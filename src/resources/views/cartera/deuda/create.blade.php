@extends('layouts.app')

@section('titulo')
  <h4>Cartera</h4>
  @endsection

@section('content')

  <!--link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"-->

  <div class="container">

    <nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav">
          <li><a href="{{ URL::to('deuda') }}">Todos los créditos</a></li>
          <li><a href="{{ URL::to('deuda/create') }}">Nuevo crédito</a>
      </ul>
    </nav>

  <h1>Nuevo Pago</h1>
        @if (count($errors)>0)
      <div class="alert alert-danget">
        <ul>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif
  

      <!--Patch para enviar al update -->
      {!!Form::model($deudas,['method'=>'PATCH', 'route'=>['deuda.update',$deudas->id_factura]])!!}
      {{Form::token()}}
      <h3>Seleccione la factura que desea pagar</h3>
      <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
        <div class="form-group">
        <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">
            @foreach($deudas as $deuda)
            <option value="0"></option>
            <option value="{{$deuda->id_factura}}">{{$deuda->id_factura}}</option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
      <h3>Digite el valor que desea pagar</h3>
      <input type="text" name="valor">
    </div>



</div>
@endsection