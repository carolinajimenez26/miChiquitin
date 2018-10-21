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
                    action="{{ route('showArticuloPedido') }}" method="GET">
                    {{ csrf_field() }}
                    <input type="text" name="id_proveedor" hidden="true" value="{{ $Id_Proveedor }}">
                    <div class="form-group">
                        <label for="id_articulo">Articulo</label>
                        <select class="form-control"  name="id_articulo" id="id_articulo">  
                    		@foreach($Articulos as $Articulo)                                  
                            	<option value="{{ $Articulo->id }}">
                            		{{ $Articulo->nombre }}                            		
                            	</option>                                                            
                    		@endforeach 
                    	</select>
                    </div>                        
                        <button type="submit" class="btn btn-danger">Seleccionar</button>
                    </form>
               </div>
               </div>
            
        </div>
    </div>
</div>
@endsection
