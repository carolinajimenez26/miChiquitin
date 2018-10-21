@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">          
          <div>
              <a class="btn btn-primary" type="button" href="{{ route('reportesProveedores')}}">Regresar</a>   
          </div>               
                <div class="container">
                  <p>
                    {{ $consulta-> total() }} registros |
                     pag {{ $consulta-> currentPage() }}
                     de {{ $consulta-> lastPage() }}
                  </p>                  
                   <table class="table table-hover">
                   		<thead>
                   			<th>Id tipo</th>
                   			<th>Representante legal</th>
                   			<th>Telefono</th>
                   			<th>Razon Social</th>
                        <th>Persona Juridica</th>
                        <th>Departamento</th>
                        <th>Ciudad</th>
                        <th>Direccion</th>
                        <th>Fecha Creación</th>                     
                   		</thead>
                   		@foreach($consulta as $proveedor)
                   		<tbody>
                   			<td>
                   				<p>{{ $proveedor->id_tipo }}</p>
                   			</td>
                   			 <td>
                   				<p>{{ $proveedor->representante_legal }}</p>
                   			</td>
                   			<td>
                   				<p>{{ $proveedor->telefono }}</p>
                   			</td>
                   			<td>
                   				<p>{{ $proveedor->razon_social }}</p>
                   			</td>
                   			<td>
                   				<p>{{ $proveedor->per_jur }}</p>
                   			</td>
                        <td>
                          <p>{{ $proveedor->departamento }}</p>
                        </td>
                        <td>
                          <p>{{ $proveedor->ciudad }}</p>
                        </td>
                        <td>
                          <p>{{ $proveedor->direccion }}</p>
                        </td>                       
                        <td>
                          <p>{{ $proveedor->created_at }}</p>
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
