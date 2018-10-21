@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <div class="container"  id="">
                        <form class="form-horizontal" method="POST" action="{{ route('reporteArticulo') }}">
                            {{ csrf_field() }}                            
                            <div class="form-group" >
                            	<div class="radio">
                            	  <label>
                            	    <input type="radio" name="optionsRadios" id="optionsRadiosArticulo1" value="option1" checked>
                            	    Nombre del articulo
                            	  </label>
                            	</div>
                            	<div class="radio">
                            	  <label>
                            	    <input type="radio" name="optionsRadios" id="optionsRadiosArticulo2" value="option2">
                            	    Nombre del Proveedor
                            	  </label>
                            	</div>
                            </div>
                            <div class="form-group" id="campo1">
                                <label for="texto">Filtro</label>
                                <input type="text" class="form-control" hidden="true" id="texto" placeholder="filtro de busqueda" name="texto" 
                                value="" >                                 
                            </div>       
                            <div class="form-group" hidden="true" id="campo2">
                                <label for="texto2">Filtro</label>
                                <input type="text" class="form-control" hidden="true" id="texto2" placeholder="filtro de busqueda proveedor" name="texto2" 
                                value="" >                                 
                            </div>                                                   
                            <button type="submit" class="btn btn-primary">Buscar</button>                                                           
                        </form>
                    </div>
                </div>            
            </div>
    </div>
</div>
@endsection

