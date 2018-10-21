@extends('Contabilidad.varcontrol.template')

@section('content2')
    <div class ="container text-center">

      <div class ="page-header">
        <h1>
          <i class='fa fa-pencil-square-o'></i>
          CAMBIO EN VALORES VARIABLES <a href="{{ route('varcontr.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i>Valor</a>
        </h1>
      </div>
      <div class="page">
        <div class ="table-responsive">
            <table class="table.table.table-striped.table-bordered.table-hover">
                <thead>
                  <tr>
                    <th>Editar</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Valor</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($varcontrl as $Varcontrol)
                    <tr>
                      <td><a href="{{ route('varcontr.edit', $Varcontrol) }}" class="btn btn-primary"><i class="fa fa-pencil-square"></a></td>
                      <td>{{ $Varcontrol->nombre }}</td>
                      <td>{{ $Varcontrol->descripcion }}</td>
                      <td>{{ $Varcontrol->valor }}</td>

                    </tr>

                  @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>

@endsection
