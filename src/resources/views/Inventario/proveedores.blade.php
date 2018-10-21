@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                  <a class="btn btn-primary" type="button" href="{{ route('eliminar') }}">Eliminar</a>
                  <a class="btn btn-primary" type="button" href="{{ route('actualizar') }}">Actualizar</a>
                  <a class="btn btn-primary" type="button" href="{{ route('agregar') }}">Agregar</a>
                <div class="container">
                   <table class="table table-hover">
                   		<thead>
                   			<th>id</th>
                   			<th>id tipo</th>
                   			<th>fecha</th>
                   			<th>representante legal</th>
                   			<th>id representante</th>
                   			<th>telefono</th>
                   			<th>razon social</th>
                   			<th>per jur</th>
                   			<th>departamento</th>
                   			<th>direccion</th>
                   			<th>ciudad</th>
                   		</thead>
                   		@foreach($proveedores as $proveedor)
                   		<tbody>
                   			<td>
                   				<p>{{ $proveedor->id }}</p>
                   			</td>
                   			<td>
                   				<p>{{ $proveedor->id_tipo }}</p>
                   			</td>
                   			 <td>
                   				<p>{{ $proveedor->updated_at }}</p>
                   			</td>
                   			<td>
                   				<p>{{ $proveedor->representante_legal }}</p>
                   			</td>
                   			<td>
                   				<p>{{ $proveedor->id_representante }}</p>
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
                   				<p>{{ $proveedor->direccion }}</p>
                   			</td>
                   			<td>
                   				<p>{{ $proveedor->ciudad }}</p>
                   			</td>
                   		</tbody>
                   		@endforeach
                   </table>
               </div>
               </div>
            
        </div>
    </div>
</div>
@endsection
