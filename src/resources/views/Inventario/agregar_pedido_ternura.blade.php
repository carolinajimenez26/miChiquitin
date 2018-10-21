@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            
                <div class="panel-heading">
                  @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                          @foreach($errors->all() as $error)
                            <li> {{ $error }} </li>
                          @endforeach
                        </ul>
                    </div>  
                  @endif  
                </div>
                <div class="panel-body">

                <div class="container">
                    <form class="form-horizontal" id="agregarPedido" 
                    action="{{ route('storePedido') }}" method="POST">
                    {{ csrf_field() }}

                    @foreach($Articulos as $Articulo)
                        <input type="text" name="id_proveedor" hidden="true" value="{{ $Articulo->id_proveedor  }}">
                        <input type="text" name="id_articulo" id="id_articulo" hidden="true" value="{{ $Articulo->id }}">
                        <input type="integer" id="preciobasico"  name="preciobasico" hidden="true" value="{{ $Articulo->precio_basico }}">                       
                                 
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>                            
                            <input class="form-control" type="text" name="cantidad" id="cantidad" value="{{ $Articulo->cantidad }}"
                            >  
                        </div>
                        <div class="form-group" id="CostoAMostrar" hidden="true">
                            <label for="costo_total">Costo Total</label>                            
                            <input class="form-control" type="integer" name="costo_total" id="costo_total" 
                            value="" readonly="true">  
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha</label>                            
                            <input class="form-control" type="date" name="fecha" id="fecha" value="{{ $Articulo->fecha }}">  
                        </div> 
                        <div class="form-group">
                            <label for="estado">estado</label>                            
                            <input class="form-control" type="integer" readonly="true" name="estado" id="estado"  value="EnEspera">  
                        </div>
                    @endforeach                        
                        <button type="submit" id="BtnAgregar" class="btn btn-danger">Crear</button>
                    </form>
               </div>
               </div>
            
        </div>
    </div>
</div>
@endsection
