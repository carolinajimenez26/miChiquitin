@extends('layouts.app')

@section('titulo')
  <h4>Cartera</h4>
  @endsection

@section('content')
  <div class="container">


  <h1>Todos los pagos</h1>
  @include('cartera.pago.search')
  <div class="col-lg-12">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID. Cliente</td>
                <td>Nombre Usuario</td> 
                <td>ID. Deuda</td>
                <td>Pago</td>
                <td>Fecha de pago</td>
                <!--<td colspan="2"></td>-->
            </tr>
        </thead>
        <tbody>
        @foreach($pagos as $pag)
            <tr>
              <td>{{ $pag->deuda->user->id_tipo }}</td>
              <td>{{ $pag->deuda->user->name }}</td>
              <td>{{ $pag->id_deuda }}</td>
              <td>{{ $pag->valor }}</td>
               <td>{{ $pag->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
  </div>
  </div>
@endsection