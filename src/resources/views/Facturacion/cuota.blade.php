@extends('layouts.app')

@section('titulo')
	Pago de Credito
@endsection


@section('content')

 {!! Form::open(['route' => 'factura.pagoCuota', 'method' => 'GET']) !!}

  <div class="col-md-7">
    <div class="form-group">
      {!! Form::label('id_factura', 'Numero de factura') !!}
      {!! Form::number('id_factura', null,['class' => 'form-control', 'placeholder'=> 'Numero de factura','min'=> 1, 'required' =>'required'])!!}
    </div>
  </div>

  <div class="col-md-7">
    <div class="form-group">
      {!! Form::label('metodo', 'Abono') !!}
      {!! Form::number('abono', null,['class' => 'form-control', 'placeholder'=> 'Abono','min'=> 1, 'required' =>'required'])!!}
    </div>
  </div>

  <div class="col-md-7">
    <div class="form-group">
      {!! Form::submit('Iniciar', ['class' => 'btn btn-primary']) !!}
    </div>
  </div>

  {!! Form::close()!!}

@endsection