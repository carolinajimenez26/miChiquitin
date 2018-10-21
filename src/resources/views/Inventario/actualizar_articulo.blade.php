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
                            <select  class="form-control" name="idArticulo" id="idArticulo">                            
                                @foreach($Articulos as $articulo)
                                    <option value="{{ $articulo->id }},*{{ $articulo->nombre }},*{{ $articulo->cantidad }},*{{ $articulo->descripcion }},*{{ $articulo->precio_basico }}">
                                        {{ $articulo->id }}-{{ $articulo->nombre }}
                                    </option>
                                @endforeach  
                        </select>
                        <button class="btn btn-danger" id="updateButton">Seleccionar</button>                   
                    </div>
                    <br>
                    <div class="container" hidden="true" id="showForm">
                        <form class="form-horizontal" method="POST" action="{{ route('updateArticulo') }}">
                            {{ csrf_field() }}
                            <input type="text" name="id" id="id" readonly="true" hidden="true" value="">
                            <div class="form-group" >
                                <label for="Nombre">Nombre</label>
                                <input type="text" class="form-control" id="Nombre" placeholder="Nombre" name="Nombre"  
                                value="">
                            </div>
                            <div class="form-group" >
                                <label for="Cantidad">Cantidad</label>
                                <input type="text" class="form-control" id="Cantidad" placeholder="Cantidad" name="Cantidad" 
                                value="">
                            </div>
                            <div class="form-group" >
                                <label for="Basico">Precio Basico</label>
                                <input type="text" class="form-control" id="Basico" placeholder="precio_basico" name="precio_basico" 
                                value="">
                            </div>
                            <div class="form-group" >
                                <label for="Descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="Descripcion" placeholder="Descripcion" name="Descripcion"  
                                value="">
                            </div>
                            <!--<div class="form-group" >
                                <label for="Proveedor">Id Proveedor</label>
                                <input type="text" class="form-control" id="Proveedor" placeholder="Id Proveedor" name="Proveedor"  
                                value="">
                            </div> -->
                            <button type="submit" class="btn btn-primary">Actualizar</button>                                                           
                        </form>
                    </div>
                </div>            
            </div>
    </div>
</div>
@endsection

