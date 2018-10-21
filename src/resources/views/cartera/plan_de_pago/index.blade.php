@extends('layouts.app')

@section('titulo')
  <h4>Cartera</h4>
  @endsection

@section('content')
  <div class="container">

  <nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav">
          <li><a href="{{ URL::to('plan_de_pago') }}">Todos los planes</a></li>
          <li><a href="{{ URL::to('plan_de_pago/create') }}">Nuevo plan</a>
      </ul>
  </nav>
  <h1>Planes de pago</h1>
  <div class="col-lg-12">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <!--td>ID</td-->
                <td>Descripción</td>
                <td>Cuotas</td>
                <td>Interés</td>
                <td>Forma de pago</td>
                <td colspan="3"></td>
            </tr>
        </thead>
        <tbody>
        @foreach($planes as $plan)
            <tr>
                <!--td>{{ $plan->id_plan_de_pago }}</td-->
                <td>{{ $plan->nombre_plan }}</td>
                <td>{{ $plan->cuotas }}</td>
                <td>{{ number_format($plan->interes) }}%</td>
                <td>{{ $plan->forma_pago }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>
                   <!-- show the plan (uses the show method found at GET /plan_de_pago/{id} -->
                  <a class="btn btn-small btn-success" href="{{ URL::to('plan_de_pago/' . $plan->id_plan_de_pago) }}">Ver</a>
                </td>
                <td>
                   <!-- edit this plan (uses the edit method found at GET /plan/{id}/edit -->
                  <a class="btn btn-small btn-info" href="{{ URL::to('plan_de_pago/' . $plan->id_plan_de_pago . '/edit') }}">Editar</a>
                </td>
                <!--td>
                    <delete the plan (uses the destroy method DESTROY /plan_de_pago/{id}>
                    {{ Form::open([
                      'method' => 'DELETE',
                      'route' => ['plan_de_pago.destroy', $plan->id_plan_de_pago]]) }}
                      {{ Form::submit('Eliminar', ['class' => 'btn btn-small btn-danger']) }}
                    {{ Form::close() }}
                </td-->
            </tr>
        @endforeach
        </tbody>
    </table>
  </div>
  </div>
@endsection