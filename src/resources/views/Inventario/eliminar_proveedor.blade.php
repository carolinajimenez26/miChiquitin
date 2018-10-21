@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
	                <div class="container">
                        <form class="form-horizontal" id="borrar_proveedor" 
                        action="{{ route('eliminar_post') }}" method="POST">
                            {{ csrf_field() }}
                            <select  class="form-control" name="id_eliminar_proveedor">
                                @foreach($proveedores as $proveedor)
                                    <option value="{{$proveedor->id}}">
                                        {{$proveedor->id}}-{{$proveedor->representante_legal}}
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

