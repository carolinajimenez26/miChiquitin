@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            
                <div class="panel-heading">
                   <!-- <a class="btn btn-primary" type="button" href=" route('eliminarPedido') }}">Eliminar</a>-->
                    <a class="btn btn-primary" type="button" href="{{ route('actualizarPedido') }}">Actualizar</a>
                    <a class="btn btn-primary" type="button" href="{{ route('showPedido') }}">Agregar</a>    
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
                   			<th>id Articulos</th>
                   			<th>id Provedores</th>
                   			<th>Cantidad</th>
                   			<th>Costo Total</th>
                        <th>Fecha</th>                        
                   			<th>Estado</th>
                   		</thead>
                   		@foreach($data as $pedidos)
                   		<tbody>
                   			<td>
                   				<p>{{ $pedidos->id_articulo }}</p>
                   			</td>
                   			 <td>
                   				<p>{{ $pedidos->id_proveedor }}</p>
                   			</td>
                   			<td>
                   				<p>{{ $pedidos->cantidad }}</p>
                   			</td>
                   			<td>
                   				<p>{{ $pedidos->costo_total }}</p>
                   			</td>
                        <td>
                          <p>{{ $pedidos->fecha }}</p>
                        </td>                        
                   			<td>
                   				<p>{{ $pedidos->estado }}</p>
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
