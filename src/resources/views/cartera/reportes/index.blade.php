@extends('layouts.app')

@section('titulo')
  <h4>Cartera / <a href="{{ URL::to('reportes') }}">Reportes</a></h4>
  @endsection

@section('content')

  <!--link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"-->

  <div class="container">

    <nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav">
          <li><a href="{{ URL::to('reportes/reporte_deudas') }}">Reporte deudas</a></li>
          <li><a href="{{ URL::to('reportes/pagos_ultima_semana') }}">Pagos última semana</a>
          <li><a href="{{ URL::to('reportes/pagos_ultimo_mes') }}">Pagos último mes</a>
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
    <div class="container">

      <h1 class="my-4">Generación de tres tipos de reportes</h1>

      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="panel h-100">
            <h4 class="panel-header well">Reporte deudas</h4>
            <div class="panel-body">
              <p class="panel-text">
                Información acerca de cada deuda como: la fecha, valor pagado, el valor a pagar y su estado.
                Tambíen información acerca del usuario como: documento, nombre.
                Además datos sobre la factura a la cual se asocia la deuda.
                Y el total que se ha pagado hasta la fecha.
              </p>
            </div>
            <div class="panel-footer">
              <a href="{{ URL::to('reportes/reporte_deudas') }}" class="btn btn-primary">Ver</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="panel h-100">
            <h4 class="panel-header well">Pagos última semana</h4>
            <div class="panel-body">
              <p class="panel-text">
                Se muestra información relevante de cada pago realizado en la última semana como: fecha, documento del cliente, nombre.
                Adicional a esto se muestra la fecha en la que se creo la deuda a la cual se hace el pago.
                Finalmente se muestra el valor de cada pago y el total pagado de la deuda y su estado.                
              </p>
            </div>
            <div class="panel-footer">
              <a href="{{ URL::to('reportes/pagos_ultima_semana') }}" class="btn btn-primary">Ver</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="panel h-100">
            <h4 class="panel-header well">Pagos último mes</h4>
            <div class="panel-body">
              <p class="panel-text">
                Permite observar todos los pagos realizados en el último mes con su respectiva información.
                Al igual que el reporte semanal este muestra toda la información importante de cada uno de los pagos 
                y el total de la deuda para un usuario.
              </p>
            </div>
            <div class="panel-footer">
              <a href="{{ URL::to('reportes/pagos_ultimo_mes') }}" class="btn btn-primary">Ver</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    
@endsection