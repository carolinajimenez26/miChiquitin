@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">          
          <div>
              <a class="btn btn-primary" type="button" href="{{ route('reportesArticulos')}}">Regresar</a>   
          </div>               
                <div class="container">
                  <p>
                    {{ $consulta-> total() }} registros |
                     pag {{ $consulta-> currentPage() }}
                     de {{ $consulta-> lastPage() }}
                  </p>                  
                   <table class="table table-hover">
                   		<thead>
                   			<th>Id</th>
                   			<th>Nombre</th>
                   			<th>Descripcion</th>
                   			<th>Precio Basico</th>
                        <th>Cantidad</th>   
                        <th>Proveedor</th>
                        <th>Fecha Creación</th>                     
                   		</thead>
                   		@foreach($consulta as $articulo)
                   		<tbody>
                   			<td>
                   				<p>{{ $articulo->id }}</p>
                   			</td>
                   			 <td>
                   				<p>{{ $articulo->nombre }}</p>
                   			</td>
                   			<td>
                   				<p>{{ $articulo->descripcion }}</p>
                   			</td>
                   			<td>
                   				<p>{{ $articulo->precio_basico }}</p>
                   			</td>
                        <td>
                          <p>{{ $articulo->cantidad }}</p>
                        </td>
                        <td>
                          <p>{{ $articulo->id_proveedor }}</p>
                        </td>
                        <td>
                          <p>{{ $articulo->fecha }}</p>
                        </td>                                            
                   		</tbody>
                   		@endforeach  
                   </table>
                   {!! $consulta-> render() !!}
               </div>
               
          </div>
        </div>
    </div>
</div>
@endsection
