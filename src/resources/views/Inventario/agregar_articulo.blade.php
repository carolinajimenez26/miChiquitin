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
                    <form class="form-horizontal" id="agregarProveedor" 
                    action="{{ route('storeArticulo') }}" method="POST">
                    {{ csrf_field() }}

                        <div class="form-group">   
                            <label for="id">id</label>                        
                            <input type="text" class="form-control" placeholder="Buscar" aria-describedby="addon" id="searchBar" name="searchBar">
                        </div>                         
                        <div class="form-group">
                            <label for="nombre">Nombre</label>                            
                            <input class="form-control" type="text" name="nombre" id="nombre">
                        </div>       
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>                            
                            <input class="form-control" type="text" name="descripcion" id="descripcion"> 
                        </div>     
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>                            
                            <input class="form-control" type="text" name="cantidad" id="cantidad">  
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha</label>                            
                            <input class="form-control" type="date" name="fecha" id="fecha">  
                        </div>
                        <div class="form-group">
                            <label for="precio_basico">Precio Basico</label>                            
                            <input class="form-control" type="text" name="precio_basico" id="precio_basico">  
                        </div>
                        <div class="form-group">
                            <label for="id_proveedor">Id Proveedor</label> 
                            <select class="form-control" name="id_proveedor" id="id_proveedor">
                                @foreach($id_proveedor as $proveedor)
                                    <option value="{{$proveedor->id}}">
                                        {{$proveedor->id}}-{{$proveedor->representante_legal}}
                                    </option>
                                @endforeach
                            </select>
                        </div>                        
                        <button type="submit" class="btn btn-danger">Crear</button>
                    </form>
               </div>
               </div>
            
        </div>
    </div>
</div>
@endsection
