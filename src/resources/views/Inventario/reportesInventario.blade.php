@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            
                <div class="panel-heading">
                    <a class="btn btn-primary" type="button" href="{{ route('reportesProveedores')}}">Proveedores</a>
                    <a class="btn btn-primary" type="button" href="{{ route('reportesArticulos') }}">Articulos</a>   
                    <a class="btn btn-primary" type="button" href="{{ route('reportesPedidos') }}">Pedidos</a>                    
                </div>            
        </div>
    </div>
</div>
@endsection
