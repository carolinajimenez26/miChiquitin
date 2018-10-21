@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <div class="container"  id="">
                        <form class="form-horizontal" method="POST" action="{{ route('reporteProveedor') }}">
                            {{ csrf_field() }}                            
                            <div class="form-group" >
                            	<div class="radio">
                            	  <label>
                            	    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                            	    Departamento o Ciudad
                            	  </label>
                            	</div>
                            	<div class="radio">
                            	  <label>
                            	    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            	    id Tipo
                            	  </label>
                            	</div>
                            </div>
                            <div class="form-group" >
                                <label for="texto">Filtro</label>
                                <input type="text" class="form-control" id="texto" placeholder="filtro de busqueda" name="texto" 
                                value="">
                            </div>                           
                            <button type="submit" class="btn btn-primary">Buscar</button>                                                           
                        </form>
                    </div>
                </div>            
            </div>
    </div>
</div>
@endsection

