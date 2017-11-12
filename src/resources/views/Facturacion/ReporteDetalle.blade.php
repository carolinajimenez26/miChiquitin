@extends('layouts.app')

@section('titulo')
	Reporte mas detallado
@endsection

@section('content')
	<table class='table table-striped'>
		<thead>
			<th>ID Factura</th>
			<th>ID Articulo</th>
			<th>Cantidad</th>
			<th>Precio venta</th>
			<th>Pendiente</th>
		</thead>
		<tbody>
			@foreach($datos as $datos)
			<tr>
				<td>{{$datos->id_factura}}</td>
				<td>{{$datos->id_articulo}}</td>
				<td>{{$datos->cantidad}}</td>
				<td>{{$datos->precio_venta}}</td>
				<td>{{$datos->pendiente}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<a class="btn btn-primary" href="javascript:history.back(-1);" title="Ir la página anterior">Volver</a>
@endsection
