@extends('layouts.app')

@section('titulo')
  <h4>Cartera</h4>
@endsection

@section('content')
  <div class="container">

    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('plan_de_pago') }}">Todos los planes</a></li>
            <li><a href="{{ URL::to('plan_de_pago/create') }}">Nuevo plan</a>
        </ul>
    </nav>
    <h1 align="center">{{$plan->nombre_plan}}</h1>
    <div class="col-lg-12">
      @if (Session::has('message'))
          <div class="alert alert-info">{{ Session::get('message') }}</div>
      @endif
    <div/>

    <div>
      <div class="jumbotron text-center">
        <p>
            <strong>Cuotas:</strong> {{ $plan->cuotas }}<br>
            <strong>Valor cuotas:</strong> $ {{ $plan->valor_cuota }}<br>
            <strong>Interes:</strong> {{ $plan->interes }} %<br>
            <strong>Medio de pago:</strong> {{ $plan->forma_pago }}
        </p>
      </div>
    <div/>

  <div/>
@endsection