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
      {!! Form::number('id_cliente',null,['class' => 'form-control', 'placeholder'=> 'Identificación del cliente','min'=> 11])!!}
    </div>
  </div>

  <div class="col-md-7">
    <div class="form-group" id="metodo">
      {!! Form::label('metodo', 'Plan de pago') !!}
      {!! Form::select('metodo',['1' => 'Efectivo', '2' => 'Credito'], null, ['class' => 'form-control','onClick' => 'parent.cuotas()'])!!}
    </div>
  </div>

  <div class="col-md-7">
    <div class="form-group" id="Cuotas" hidden="">
      {!! Form::label('cuotas', 'Numero de cuotas por mes') !!}
      {!! Form::select('cuotas',['1' => '1 cuota', '3' => '3 cuotas', '6' => '6 cuotas'], null, ['class' => 'form-control'])!!}
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

<script type="text/javascript">
  
  function cuotas() {
    var type= $("[name=metodo]").val();
    console.log(type);
    if (type == "2") {
      $("#Cuotas").show();
    }
    if (type == "1") {
      $("#Cuotas").hide();
    }
  } 
</script>
