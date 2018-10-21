@extends('layouts.app')

@section('titulo')
    Pagina Principal
    @endsection

@section('content')
  @if (Session::has('flash_message'))
    <script type="text/javascript">
      alert("{{Session::get('flash_message')}}");
    </script>
   @endif
    <div class="jumbotron">
        <h1 class="display-3">Bienvenido </h1>
        <p class="lead">Hola, {{Auth::user()->name}}, aqui podrás .......... .  </p>
    </div>

    <div class="row marketing">
        <div class="col-lg-6">
            <h4>Funcionalidad 1 </h4>
            <p>Explicación 1</p>

            <h4>Funcionalidad 2 </h4>
            <p>Explicación 2</p>


        </div>

        <div class="col-lg-6">
            <h4>Funcionalidad 3</h4>
            <p>Explicación 3</p>

            <h4>Funcionlidad 4</h4>
            <p>Explicación 4</p>
        </div>
    </div>

@endsection
