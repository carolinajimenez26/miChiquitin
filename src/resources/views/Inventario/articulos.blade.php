@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            
                <div class="panel-heading">
                    <a class="btn btn-primary" type="button" href="{{ route('eliminarArticulo')}}">Eliminar</a>
                    <a class="btn btn-primary" type="button" href="{{ route('actualizarArticulo') }}">Actualizar</a>
                    <a class="btn btn-primary" type="button" href="{{ route('agregarArticulo') }}">Agregar</a>    
                </div>
                <div class="panel-body">
	                

                <div class="container">
                  <p>
                    {{ $data-> total() }} registros |
                     pag {{ $data-> currentPage() }}
                     de {{ $data-> lastPage() }}
                  </p>                  
                   <table class="table table-hover">
                   		<thead>
                   			<th>Nombre</th>
                   			<th>Descripcion</th>
                   			<th>Precio Basico</th>
                   			<th>Cantidad</th>
                   			<th>Id Proveedor</th>
                   		</thead>
                   		@foreach($data as $articulo)
                   		<tbody>
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
                   				<p>
                            @foreach($proveedor as $prov)
                              @if($articulo->id_proveedor == $prov->id)
                                {{ $prov->representante_legal }}                              
                              @endif
                            @endforeach
                          </p>
                   			</td>                   			
                   		</tbody>
                   		@endforeach  
                   </table>
                   {!! $data-> render() !!}
               </div>
               </div>
            
        </div>
    </div>
</div>
@endsection
