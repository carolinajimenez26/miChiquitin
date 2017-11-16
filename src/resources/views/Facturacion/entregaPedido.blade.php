@extends('layouts.app')

@section('titulo')
<div class="container-fluid">
  Entregar articulo pendiente
</div>
@endsection

@section('content')

  @if(isset($men))
      {!! Form::hidden('mensaje', $men, ['id' => 'mensaje']) !!}
      <script>
        var mensaje =document.getElementById("mensaje").value;
        console.log(mensaje)
        alert(mensaje)
      </script>
   @endif

  {!! Form::open(['route' => 'EntregasPendiente', 'method' => 'GET']) !!}

  <div class="col-md-7">
    <div class="form-group">
      {!! Form::label('id_cliente', 'Identificación del cliente') !!}
      {!! Form::number('id_cliente', null,['class' => 'form-control', 'placeholder'=> 'Identificación del cliente','min'=> 1, 'required' =>'required'])!!}
    </div>
  </div>

  <div class="col-md-7">
    <div class="form-group">
      {!! Form::submit('Iniciar', ['class' => 'btn btn-primary']) !!}
    </div>
  </div>
  {!! Form::close()!!}

  
  @if(isset($facturas))
    <table class='table table-striped' >
      <thead>
        <th>ID</th>
        <th>ID Factura</th>
        <th>ID Articulo</th>
        <th>ID cantidad</th>
        <th>Precio Venta</th>
        <th>Pendiente</th>
        <th>Cantidad Inventario</th>
      </thead>
      <tbody>
        <?php $i = 0; ?>
        @foreach($facturas as $factura)
          <tr>
            <td>{{$factura->id}}</td>
            <td>{{$factura->id_factura}}</td>
            <td>{{$factura->id_articulo}}</td>
            <td>{{$factura->cantidad}}</td>
            <td>{{$factura->precio_venta}}</td>
            <td>{{$factura->pendiente}}</td>
            <td>{{$cantidad[$i]}}</td>
            <td>
              <div class="form-group">
                {!! Form::open(['route' => 'Entrega', 'method' => 'GET']) !!}
                {!! Form::hidden('id_factura', $factura->id) !!}
                {!! Form::hidden('id_articulo', $factura->id_articulo) !!}
                {!! Form::hidden('cantidadPendiente', $factura->pendiente) !!}
                {!! Form::hidden('cantidadInventario', $cantidad[$i]) !!}
                {!! Form::submit('Entregar articulo', ['class' => 'btn btn-primary']) !!}
                {!! Form::close()!!}
              </div>  
            </td>
          </tr>
            <?php $i = $i + 1; ?>

        @endforeach
      </tbody>
    </table>
  @endif

@endsection

