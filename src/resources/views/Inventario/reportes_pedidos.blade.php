@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <div class="container"  id="">
                        <form class="form-horizontal" method="POST" action="{{ route('reportePedido') }}">
                            {{ csrf_field() }}                            
                            <div class="form-group">
                                <label for="select">Filtro</label>
                                <select class="form-control" name="estado" id="estado">
                                    <option value="EnEspera">En Espera</option>    
                                    <option value="RechazadoProveedor">Rechazado por Proveedor</option>    
                                    <option value="RechazadoCapital">Rechazado por Capital Insuficiente</option>    
                                    <option value="Cancelado">Cancelado</option>    
                                    <option value="Aprobado">Aprobado</option>    
                                </select>                             
                            </div>       
                                                  
                            <button type="submit" class="btn btn-primary">Buscar</button>                                                           
                        </form>
                    </div>
                </div>            
            </div>
    </div>
</div>
@endsection

