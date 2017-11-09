@extends('layouts.app')

@section('titulo')
<div class="container-fluid">
  Factura de Venta 
</div>
@endsection

@section('content')

  {!! Form::open(['route' => 'factura.validacion.validar', 'method' => 'GET','id_vendedor' => Auth::user()->id_tipo]) !!}

  <div class="col-md-7">
    <div class="form-group">
      {!! Form::label('id_cliente', 'Identificación del cliente') !!}
      {!! Form::text('id_cliente',null,['class' => 'form-control', 'placeholder'=> 'Identificación del cliente'])!!}
    </div>
  </div>

  <div class="col-md-7">
    <div class="form-group" id="metodo">
      {!! Form::label('metodo', 'Plan de pago') !!}
      {!! Form::select('metodo',['1' => 'Efectivo', '2' => 'Credito'], null, ['class' => 'form-control'] ,array('onclick' => 'cuotas()'))!!}
    </div>
  </div>

  <div class="col-md-7">
    <div class="form-group">
      {!! Form::label('cuotas', 'Numero de cuotas') !!}
      {!! Form::select('cuotas',['0' => '0','1' => '1 mes', '3' => '3 meses', '6' => '6 meses'], null, ['class' => 'form-control'])!!}
    </div>
  </div>

  <div class="col-md-7">
    <div class="form-group">
      {!! Form::submit('Iniciar', ['class' => 'btn btn-primary']) !!}
    </div>
  </div>
  {!! Form::close()!!}

  @if ($status == '1')
    <div class="alert alert-danger" role="alert">
    No es posible realizar esta venta, por favor contacte con su administrador
    </div>
  @endif

  @if ($status == '2')
    <div class="alert alert-danger" role="alert">
      Aun no ha digitado la identificación del cliente
    </div>
  @endif

@endsection

@section('script')
  function cuotas() {
    var type= $("[name=metodo]").val();
    console.log(type);
    console.log("vida");
    if (type == "1") {
      $("#Cuotas").show();
    }
    if (type == "2") {
      $("#Cuotas").hide();
    }
  } 
@endsection