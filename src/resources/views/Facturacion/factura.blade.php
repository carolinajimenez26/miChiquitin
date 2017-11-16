@extends('layouts.app')

@section('titulo')

  <div class="container">
    <div class="row">
      <div class="col-sm-10">
        Factura de Venta # {{ $idFactura }}
      </div>
      <div class="col-sm-2">
        {{$fecha}}
      </div>
    </div>
  </div>
@endsection

@section('content')

<div class="container-fluid información">
  <div class="row">
     <div class="col-md-8">
      <label> Vendedor: {{ Auth::user()->name }}</label> <br>
      <label> Identificación del cliente: {{ $id_cliente }}</label> <br>
      <label> Nombre del cliente: {{ $nombre_cliente }} </label> <br>
      <label> Plan de pago: {{ $plan_pago }}  </label><br>
      <label> Cuotas: {{ $cuota_credito }}  </label><br>
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
      <th class="col-sm-5">Descripción</th>
      <th>Cantidad</th>
      <th>Precio unitario</th>
      <th>Precio total</th>
      <th>Pendiente</th>
    </thead>
    <tbody id="body">
        @for ($i = 0; $i < count($lista_productos); $i++)
          @if( ($i%7) == 0 )
          <tr>
            <td>{{ $lista_productos[$i] }}</td>
            <td>{{ $lista_productos[$i+1] }}</td>
            <td>{{ $lista_productos[$i+2] }}</td>
            <td>{{ $lista_productos[$i+3] }}</td>
            <td>{{ $lista_productos[$i+4] }}</td>
            <td>{{ $lista_productos[$i+5] }}</td>
          </tr>
          @endif
        @endfor
    </tbody>
  </table>
</div>

<div class="container-fluid productos">
  <h2>Total: $ {{ (int)$total}}</h2>
</div>

@endsection