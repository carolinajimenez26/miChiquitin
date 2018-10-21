@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">          
          <div>
              <a class="btn btn-primary" type="button" href="{{ route('reportesPedidos')}}">Regresar</a>   
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
                   			<th>Id Articulo</th>
                   			<th>Id Proveedor</th>
                   			<th>Cantidad</th>
                        <th>Costo Total</th>   
                        <th>Estado</th>
                        <th>Fecha Creación</th>                     
                   		</thead>
                   		@foreach($consulta as $pedido)
                   		<tbody>
                   			<td>
                   				<p>{{ $pedido->id }}</p>
                   			</td>
                   			 <td>
                   				<p>{{ $pedido->id_articulo }}</p>
                   			</td>
                   			<td>
                   				<p>{{ $pedido->id_proveedor }}</p>
                   			</td>
                   			<td>
                   				<p>{{ $pedido->cantidad }}</p>
                   			</td>
                        <td>
                          <p>{{ $pedido->costo_total }}</p>
                        </td>
                        <td>
                          <p>{{ $pedido->estado }}</p>
                        </td>
                        <td>
                          <p>{{ $pedido->fecha }}</p>
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
