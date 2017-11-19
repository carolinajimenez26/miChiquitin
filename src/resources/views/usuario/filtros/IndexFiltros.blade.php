@extends('layouts.app')

@section('titulo')
    Lista de Clientes por
    @endsection

@section('content')
  @if(Session::has('flash_message'))
              <script type="text/javascript">
                alert("{{Session::get('flash_message')}}");
              </script>
  @endif
<div class="jumbotron">
  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">


    <form class="col-md-6 col-lx-6 col-lg-6 col-sm-6" action="{{route('name',['name' => "name"])}}" method="get">
        <label for="exampleInputEmail1">Buscar Nombre</label>
        <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="name" autofocus required/>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <form class="col-md-6 col-lx-6 col-lg-6 col-sm-6" action="{{route('genero',['genero' => "genero"])}}" method="get">
        <label for="exampleInputEmail1">Genero</label>
        <input type="text" class="form-control" name="genero"  placeholder="#" autofocus required/>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <form class="col-md-6 col-lx-6 col-lg-6 col-sm-6" action="{{route('ciudad',['ciudad' => "ciudad"])}}" method="get">
        <label for="exampleInputEmail1">Filtro Ciudad</label>
        <input type="text" class="form-control" name="ciudad" aria-describedby="emailHelp" placeholder="Pereira" autofocus required/>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

</div>
<a href="{{route('acceso')}}" class="btn btn-info">Acceso</a>
<a href="{{route ('ciudades')}}" class="btn btn-info">Ciudades</a>

</div>
@endsection