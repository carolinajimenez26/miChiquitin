@extends('layouts.app')

@section('titulo')
  <h4>Cartera</h4>
  @endsection

@section('content')
  <div class="container">

    <nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav">
          <li><a href="{{ URL::to('deuda') }}">Todos los creditos</a></li>
          <li><a href="{{ URL::to('deuda/show') }}">Credito de un cliente</a>
      </ul>
  </nav>
  <h1>Todos los créditos</h1>
  @include('cartera.deuda.search')
  <div class="col-lg-12">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Cliente</td>
                <td>Factura</td>
                <td>Valor pagado</td>
                <td>Valor a pagar</td>
                <td>Plazo crédito</td>
                <td>Estado</td>
                <td>Realizar Pago</td>
                <!--<td colspan="2"></td>-->
            </tr>
        </thead>
        <tbody>
        @foreach($deudas as $deuda)
            <tr>
              <td>Nombre usuario</td>
              <td>{{ $deuda->id_factura }}</td>
              <td>{{ $deuda->valor_pagado }}</td><!--Deuda-->
               <td>{{ $deuda->valor_a_pagar }}</td>
              <td>{{ $deuda->plazo_credito }}</td><!--Deuda-->      
              <td>{{ $deuda->estado}}</td>
              <td><a href="{{URL::action('Cartera\DeudaController@edit',$deuda->id_deuda)}}"><button class="btn btn-warning">Pagar</button></td>
                  
                  



            </tr>
        @endforeach
        </tbody>
    </table>

  </div>
  </div>
@endsection