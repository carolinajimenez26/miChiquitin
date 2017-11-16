@extends('layouts.app')

@section('titulo')



<div class="col-sm-8">
  Nueva Venta
</div>

<div class="col-sm-2">
  {!! Form::open(['route' => 'factura.compra.impresion', 'method' => 'GET','id' => 'generarFactura','id_vendedor' => Auth::user()->id_tipo]) !!}
    <input type="button" name="generar" id='generar' value= "Generar Factura" class="btn btn-primary">
    {!! Form::hidden('lista[]', 'hola') !!}
    {!! Form::hidden('total', 'hola') !!}
    {{ Form::hidden('id_cliente', $id_cliente) }}
    {{ Form::hidden('idVendedor', Auth::user()->id) }}
    {{ Form::hidden('plan_pago', $metodo) }}
    {{ Form::hidden('cuota_credito', $cuotas_credito) }} 
    {!! Form::close()!!}
  <br>
</div>

<div class="col-sm-1">
  {!! Form::open(['route' => 'home', 'method' => 'GET']) !!}
    {!! Form::submit('Cancelar Compra', ['class' => 'btn btn-primary']) !!}
  {!! Form::close()!!}
  <br>
</div>

@endsection

@section('content')

<div class="container-fluid 1">
  <label> Identificación del Cliente: {{ $id_cliente }}</label><br>

  <label> Plan de pago: {{$metodo}}</label><br>

  <label> Cuotas: {{ $cuotas_credito }}</label>
</div>

<div class="container-fluid 1">

    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          {!! Form::label('id_producto', 'Agregar Producto') !!}
          {!! Form::text('id_producto',null,['class' => 'form-control', 'placeholder'=> 'Codigo del producto'])!!}
        </div>
      </div>

      <div class="col-sm-2 ">
        <div class="form-group">
          {!! Form::label('cantidad', 'Cantidad') !!}
          {!! Form::number('cantidad',null,['class' => 'form-control', 'placeholder'=> 'Cantidad','min'=>0])!!}
        </div>
      </div>

      <div class="col-sm-2">
        <br>
        <div class="form-group">
          <input type="button" name="agregar" id='agregar' value= "Agregar" class="btn btn-primary">
        </div>
      </div>

      <div class="col-sm-2 ">
        <h2>Total: $ </h1>
      </div>

      <div class="col-sm-2 ">
        <h2 id="numero" name= "numero" value= "0"></h2>
      </div>
</div> 

<div class="container-fluid 2">
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
    </tbody>
  </table>
</div>

@endsection
@section('jsAdicional')
  <script src="{{ asset('js/articulos.js') }}"></script>
@endsection
