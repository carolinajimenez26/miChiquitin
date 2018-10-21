@extends('layouts.app')

@section('titulo')
  <h4>Cartera</h4>
  @endsection

@section('content')

  <!--link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"-->

  <div class="container">

    <nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav">
          <li><a href="{{ URL::to('plan_de_pago') }}">Todos los planes</a></li>
          <li><a href="{{ URL::to('plan_de_pago/create') }}">Nuevo plan</a>
      </ul>
    </nav>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <h1>Nuevo plan de pago</h1>
  <div class="col-lg-6">

    {{ Form::open(array('url' => 'plan_de_pago')) }}

      <div class="form-group">
          {{ Form::label('nombre_plan', 'Descripción') }}
          {{ Form::text('nombre_plan', null, array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('cuotas', 'Cuotas') }}
          {{ Form::number('cuotas', null, array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('valor_cuota', 'Valor cuota') }}
          {{ Form::number('valor_cuota', null, array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('interes', 'Interes') }}
        {{ Form::number('interes', null, array('class' => 'form-control')) }}
      </div>
  </div>
  <div class="col-lg-6">
      <div class="form-group">
          {{ Form::label('forma_pago', 'Forma de pago') }}<br>
        {{ Form::select('forma_pago', ['Efectivo' => 'Efectivo', 'Tarjeta de crédito' => 'Tarjeta de crédito']) }}
      </div>
  </div>
  </div>

   <div class="row" align="center"><br>
    {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
  </div>

   {{ Form::close() }}
@endsection