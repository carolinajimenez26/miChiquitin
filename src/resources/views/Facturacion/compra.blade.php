@extends('layouts.app')

@section('titulo')



<div class="col-sm-8">
  Nueva Venta
</div>

<div class="col-sm-2">
  {!! Form::open(['route' => 'factura.compra.impresion', 'method' => 'GET','id' => 'generarFactura','id_vendedor' => Auth::user()->id_tipo]) !!}
    <input type="button" name="generar" id='generar' value= "Generar Factura" class="btn btn-primary">
    {!! Form::hidden('lista[]', 'hola') !!}
    {!! Form::hidden('id_cliente', $id_cliente) !!}
    {!! Form::hidden('id_vendedor', $id_vendedor) !!}
    {!! Form::hidden('metodo', $metodo) !!}
    {!! Form::hidden('cuotas', $cuotas) !!}
    {!! Form::close()!!}
  <br>
</div>

<div class="col-sm-1">
  {!! Form::open(['route' => 'home', 'method' => 'GET','id_vendedor' => Auth::user()->id_tipo]) !!}
    {!! Form::submit('Cancelar Compra', ['class' => 'btn btn-primary']) !!}
  {!! Form::close()!!}
  <br>
</div>

@endsection

@section('content')

<div class="container-fluid 1">
  <label> Identificación del Cliente: {{ $id_cliente }}</label><br>

  @if($metodo == 'Efectivo')
    <label> Plan de pago: Efectivo</label><br>
  @else
    <label> Plan de pago: Credito</label><br>
  @endif

  @if($metodo == 'Efectivo')
    <label> Cuotas: 0</label>
  @else
    <label> Cuotas: {{ $cuotas }}</label>
  @endif
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

      <div class="col-sm-4 ">
        <h2>Total:</h1>
      </div>
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
