@extends('layouts.app')

@section('titulo')

  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        Factura de Venta # 
      </div>
      <div class="col-sm-3">
        Fecha
      </div>
    </div>
  </div>
@endsection

@section('content')

<div class="container-fluid información">
  <div class="row">
     <div class="col-md-8">
      <label> Vendedor: </label> <br>
      <label> Identificación del cliente: </label> <br>
      <label> Nombre del cliente: </label> <br>
      <label> Plan de pago: </label><br>
      <label> Cuotas: </label><br>
    </div>

    <div class="col-md-4" align="right">
      <img src="{{ asset('assets/img/chiquitin.png') }}" alt="logo" width="160" height="40"><br>
      <div class="container-fluid">
        <label> NIT: 0.000.000.000-0 </label> <br>
        <label> Dirección: Calle 00 # 00 - 00 Barrio </label> <br>
        <label> Teléfono: 0000000</label> <br>
        <label> Correo: chiquitin@gmail.com </label> <br> 
      </div>
    </div>
  </div>
</div>

<div class="container-fluid productos">
  <table class='table table-striped'>
      <thead>
        <th>Codigo</th>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th>Precio venta</th>
      </thead>
      <tbody>
      </tbody>
  </table>
</div>

@endsection