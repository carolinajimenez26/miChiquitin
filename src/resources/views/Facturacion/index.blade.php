@extends('layouts.app')

@section('titulo')
<div class="container-fluid">
  Factura de Venta
</div>
@endsection

@section('content')

  {!! Form::open(['route' => 'factura.validacion.intermediar', 'method' => 'POST']) !!}

  <div class="col-md-7">
    <div class="form-group">
      {!! Form::label('id_cliente', 'Identificación del cliente') !!}
      {!! Form::number('id_cliente', null,['class' => 'form-control', 'placeholder'=> 'Identificación del cliente','min'=> 1, 'required' =>'required'])!!}
    </div>
  </div>

  <div class="col-md-7">
    <div class="form-group" id="metodo">
      {!! Form::label('metodo', 'Plan de pago') !!}
      {!! Form::select('metodo',['Efectivo' => 'Efectivo', 'Credito' => 'Credito'], null, ['class' => 'form-control','onClick' => 'parent.cuotas()'])!!}
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
      {{ Form::hidden('id_vendedor', Auth::user()->id) }}
      {!! Form::submit('Iniciar', ['class' => 'btn btn-primary']) !!}
    </div>
  </div>
  {!! Form::close()!!}

@endsection

<script type="text/javascript">

  function cuotas() {
    var type= $("[name=metodo]").val();
    console.log(type);
    if (type == "Credito") {
      $("#Cuotas").show();
    }
    if (type == "Efectivo") {
      $("#Cuotas").hide();
    }
  }
</script>
