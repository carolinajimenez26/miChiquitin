@extends('layouts.app')

@section('titulo')
    Lista de Clientes por
    @endsection

@section('content')
  @if(Session::has('error_filtro'))
                <script type="text/javascript">
                  alert("{{Session::get('error_filtro')}}");
                </script>
  @endif  @if(Session::has('flash_message'))
      <script type="text/javascript">
        alert("{{Session::get('flash_message')}}");
      </script>
    @endif
  @if(count($errors)>0)
          <div class="alert alert-warning" role="alert">
             @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                <script type="text/javascript">
                    alert("{{ $error }}");
                </script>
            @endforeach
          </div>
      @endif

  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
    <form class="col-md-6 col-lx-6 col-lg-6 col-sm-6" action="{{route('name',['name' => "name"])}}" method="get">
      <br><label for="exampleInputEmail1">Buscar Nombre</label>
        <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Carlos" autofocus required/>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>


      <form class="col-md-6 col-lx-6 col-lg-6 col-sm-6" action="{{route('correo',['correo' => "correo"])}}" method="get">
        <br><label for="exampleInputEmail1">Buscar Correo</label>
          <input type="text" class="form-control" name="correo" aria-describedby="emailHelp" placeholder="Carlos@gmail.com" autofocus required/>
        <button type="submit" class="btn btn-primary">Buscar</button>
      </form>

    <form class="col-md-6 col-lx-6 col-lg-6 col-sm-6" action="{{route('genero',['genero' => "genero"])}}" method="get">
        <br><label for="exampleInputEmail1">Genero</label>
        <select class="form-control"  id="genero" name="genero" autofocus required>
          <option>Masculino</option>
          <option>Femenino</option>
        </select>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <form class="col-md-6 col-lx-6 col-lg-6 col-sm-6" action="{{route('ciudad',['ciudad' => "ciudad"])}}" method="get">
        <br><label for="exampleInputEmail1">Filtro Ciudad</label>
        <input type="text" class="form-control" name="ciudad" aria-describedby="emailHelp" placeholder="Pereira" autofocus required/>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

  <form class="col-md-3 col-lx-3 col-lg-3 col-sm-3" action="{{route('rangocredito',['cre_min' => "cred_min",'cre_max' => "cred_max"])}}" method="get">
    <br><label  for="sel1">Credito Actual Desde:</label>
        <select class="form-control"  id="cre_min" name="cre_min" autofocus required>
          <option>500000.00</option>
          <option>1000000.00</option>
          <option>3000000.00</option>
          <option>5000000.00</option>
          <option>7000000.00</option>
          <option>10000000.00</option>
        </select>
    <br><label  for="sel1">Hasta:</label>
        <select class="form-control"  name="cre_max" autofocus required>
          <option>1000000.00</option>
          <option>3000000.00</option>
          <option>5000000.00</option>
          <option>7000000.00</option>
          <option>10000000.00</option>
        </select>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <form class="col-md-3 col-lx-3 col-lg-3 col-sm-3" action="{{route('rangocreditomax',['cre_min' => "cred_min",'cre_max' => "cred_max"])}}" method="get">
      <br><label  for="sel1">Credito Maximo Desde:</label>
          <select class="form-control"  id="cre_min" name="cre_min" autofocus required>
            <option>500000.00</option>
            <option>1000000.00</option>
            <option>3000000.00</option>
            <option>5000000.00</option>
            <option>7000000.00</option>
            <option>10000000.00</option>
          </select>
      <br><label  for="sel1">Hasta:</label>
          <select class="form-control"  name="cre_max" autofocus required>
            <option>1000000.00</option>
            <option>3000000.00</option>
            <option>5000000.00</option>
            <option>7000000.00</option>
            <option>10000000.00</option>
          </select>
          <button type="submit" class="btn btn-primary">Buscar</button>
      </form>

</div>

      <div class="trans text-right">
        <a href="{{route('acceso')}}" class="btn btn-primary">Accesos</a>
      </div>


@endsection
