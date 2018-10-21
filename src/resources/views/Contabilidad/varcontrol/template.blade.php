@extends('layouts.app')


@section('content')
    '<div class="jumbotron">
        <h1 class="display-3">Control de valores de cambio </h1>
        <p class="lead">Hola, {{Auth::user()->name}}, aqui podrás modificar las variables que cambian al paso de los años  </p>
    </div>

    <div class="row marketing">
      @if(\Session::has('message'))
        @include('Contabilidad.varcontrol.message')
      @endif
        @yield('content2')

        </div>


@endsection
