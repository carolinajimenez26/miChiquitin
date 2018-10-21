@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
	                <div class="container">
                        <form class="form-horizontal" id="actualizar_proveedor" 
                            action="{{ route('actualizar_form') }}" method="GET">
                            
                            <select  class="form-control" name="id_actualizar_proveedor">
                                @foreach($proveedores as $proveedor)
                                    <option value="{{$proveedor->id}}">
                                        {{$proveedor->id}}-{{$proveedor->representante_legal}}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-danger">actualizar</button>
                        </form>
                   
                    </div>
                </div>
            
        </div>
    </div>
</div>
@endsection

