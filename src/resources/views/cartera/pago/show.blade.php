@extends('layouts.app')

@section('titulo')
  <h4>Cartera</h4>
  @endsection

@section('content')
  <div class="container">

  
  <h1>Generar paz y salvo</h1>

  <div class="col-lg-12">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID. Cliente</td>
                <td>Nombre cliente</td>
                <td>No. Paz y Salvo</td>
                <td>No. Deuda</td>
                <td>Fecha de pago</td>
                <td>Hora de pago</td>
                <td>Concepto de pago</td>
                <td>Paz y Salvo</td>
            </tr>
        </thead>
        <tbody>
        @foreach($paz as $pa)
            <tr>
              <td>{{ $pa->deuda->user->id_tipo }}</td>
              <td>{{ $pa->deuda->user->name }}</td>
              <td>{{ $pa->id_paz_y_salvo }}</td>
              <td>{{ $pa->id_deuda }}</td><!--Deuda-->
               <td>{{ $pa->fecha }}</td>
              <td>{{ $pa->hora }}</td><!--Deuda-->      
              <td>{{ $pa->concepto}}</td>
              <td><a href="{{URL::action('Cartera\PagoController@downloadPDF',$pa->id_paz_y_salvo)}}"><button class="btn btn-warning">Descargar PDF</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
  </div>
  </div>
@endsection