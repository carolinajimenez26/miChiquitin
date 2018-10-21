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
                            <select  class="form-control" name="idPedido" id="idPedido">                            
                                @foreach($pedidos as $pedido)
                                    <option value="{{ $pedido->id }},*{{ $pedido->id_articulo }},*{{ $pedido->id_proveedor }},*{{ $pedido->cantidad }},*{{ $pedido->costo_total }},*{{ $pedido->estado }}">{{ $pedido->id }}-{{ $pedido->id_articulo }}
                                    </option>
                                @endforeach  
                        </select>
                        <button class="btn btn-danger" id="updateButton2">Seleccionar</button>                   
                    </div>
                    <br>
                    <div class="container" hidden="true" id="showForm2">
                        <form class="form-horizontal" method="POST" action="{{ route('updatePedido') }}">
                            {{ csrf_field() }}                            
                            <input type="text" name="id" id="id" readonly="true" hidden="true" value="">
                            <input type="text" id="preciobasico" readonly="true" hidden="true" value="">
                            <div class="form-group" >
                                <label for="id_articulo">id Articulo</label>
                                <input type="text" class="form-control" id="id_articulo" placeholder="id_articulo" name="id_articulo"  
                                value="" readonly="true">
                            </div>
                            <!--<div class="form-group" >
                                <label for="id_proveedor">id Proveedor</label>
                                <input type="text" class="form-control" id="id_proveedor" placeholder="id_proveedor" name="id_proveedor" 
                                value="">
                            </div>-->
                            <div class="form-group" >
                                <label for="cantidad">Cantidad</label>
                                <input type="integer" class="form-control" id="cantidad" placeholder="cantidad" name="cantidad" 
                                value="">
                            </div>
                            <div class="form-group" id="CostoAMostrar" >
                                <label for="costo_total">Costo Total</label>
                                <input type="integer" class="form-control" id="costo_total" placeholder="costo_total"
                                name="costo_total"  readonly="true" value="">
                            </div>
                            <div class="form-group" >
                                <label for="estado">Estado</label>
                                <select class="form-control" name="estado" id="estado">                                    
                                    <option value="EnEspera"> En Espera </option>
                                    <option value="RechazadoProveedor"> Rechazado por Proveedor </option>
                                    <option value="RechazadoCapital"> Rechazado por Capital Insuficiente </option>
                                    <option value="Cancelado"> Cancelado </option>
                                    <option value="Aprobado"> Aprobado </option>
                                </select>                                
                            </div> 
                            <button type="submit" class="btn btn-primary" id="BtnActualizar">Actualizar</button>                                                           
                        </form>
                    </div>
                </div>            
            </div>
    </div>
</div>
@endsection

