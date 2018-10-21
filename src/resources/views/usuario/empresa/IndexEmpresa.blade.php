@extends('layouts.app')

@section('titulo')
    Informacion de la Empresa
    @endsection

@section('content')
  @if(Session::has('flash_message'))
    <script type="text/javascript">
      alert("{{Session::get('flash_message')}}");
    </script>
  @endif
  <div class="container">
  <table class="table table-bordered table-condensed ">
        <thead>
          <tr>
          <th>Nombre</th>
          <th>Direccion</th>
          <th>Telefono</th>
        </tr>
        </thead>
	@foreach($empresas as $empresa)
    <tbody><tr>
            <td>{{$empresa->nombre}}</td>
            <td>{{$empresa->direccion}}</td>
            <td>{{$empresa->telefono}}
              <small class="pull-right">
              </form></small><small class="pull-right">
                  <a href="{{route ('Empresa.edit',['empresa' => $empresa->id_empresa])}}" class="btn btn-info">Edit</a>
            </small></td>
          </tr>
        </tbody>
    @endforeach
  </table>
</div>
@endsection
