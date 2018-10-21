@extends('layouts.app')

@section('titulo')
  <h4>Cartera</h4>
  @endsection

@section('content')
  <div class="container">

    <nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav">
          <li><a href="{{ URL::to('deuda') }}">Todos los creditos</a></li>
      </ul>
  </nav>
  <h1>Busca el cliente</h1>
  @include('cartera.deuda.per')
  <div class="col-lg-12">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID. Cliente</td>
                <td>Cliente</td>
                <td>Factura</td>
                <td>Valor a pagar</td>
                <td>Estado</td>
                <!--<td colspan="2"></td>-->
            </tr>
        </thead>
        <tbody>
        @foreach($deudas as $deuda)
            <tr>
              <td>{{ $deuda->user->id_tipo }}</td>
              <td>{{ $deuda->user->name }}</td>
              <td>{{ $deuda->id_factura }}</td>
               <td>{{ $deuda->valor_a_pagar }}</td>    
              <td>{{ $deuda->estado}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

  </div>
  </div>
@endsection