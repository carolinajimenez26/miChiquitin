@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
	                <div class="container">
                        <form class="form-horizontal" id="borrar_proveedor" 
                        action="{{ route('destroyPedido') }}" method="POST">
                            {{ csrf_field() }}
                            <select  class="form-control" name="id">
                                @foreach($pedidos as $pedido)
                                    <option value="{{$pedido->id}}">
                                        {{$pedido->id}}-{{$pedido->id_proveedor}}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-danger">borrar</button>
                        </form>
                   
                    </div>
                </div>
            
        </div>
    </div>
</div>
@endsection

