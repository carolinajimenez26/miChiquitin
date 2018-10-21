@extends('layouts.app')

@section('titulo')
  <h4>Cartera</h4>
  @endsection

@section('content')
  <div class="container">

  <nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav">
          <!--li><a href="{{ URL::to('deuda') }}">Todos los créditos</a></li>
          <li><a href="{{ URL::to('deuda/create') }}">Nuevo crédito</a-->
      </ul>
  </nav>
  <h1>Ingresar cliente</h1>
  <div class="col-lg-12">
    <div class="row">
      <div class="col-sm-6 jumbotron">
        {{ Form::label('id_cliente', 'Documento') }}
        {{ Form::number('id_cliente', null, array('class' => 'form-control')) }}
      </div>
    </div>
  </div>
@endsection