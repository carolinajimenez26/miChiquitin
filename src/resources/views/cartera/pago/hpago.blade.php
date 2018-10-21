@extends('layouts.app')

@section('titulo')
  <h4>Cartera</h4>
  @endsection

@section('content')
  <div class="container">

    <nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav">
          <li><a href="{{ URL::to('pago') }}">Todos los pagos</a></li>
      </ul>
  </nav>
  <h1>Busca el pago del cliente</h1>
  @include('cartera.pago.per')
  <div class="col-lg-12">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>id_deuda</td>
                <td>Pago</td>
                <td>Fecha de pago</td>
                <!--<td colspan="2"></td>-->
            </tr>
        </thead>
        <tbody>
        @foreach($pagos as $pag)
            <tr>
              <td>{{ $pag->id_deuda }}</td>
              <td>{{ $pag->valor }}</td><!--Deuda-->
               <td>{{ $pag->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

  </div>
  </div>
@endsection