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
                  <form class="form-horizontal" id="actualizar_post_form" 
                        action="{{ route('actualizar_post') }}" method="POST">
                    {{ csrf_field() }}
                    @foreach($proveedor as $informacion)
                      <div class="form-group">
                        <input type="text" name="id" value="{{$informacion->id}}"  readonly="true" hidden="true" display="none">
                        <label for="id_tipo">id_tipo</label>
                        <select class="form-control" name="id_tipo" id="id_tipo">
                          <option @if($informacion->id_tipo == 'CC') selected="true" @endif value="CC">CC</option>  
                          <option @if($informacion->id_tipo == 'Pasaporte') selected="true"  @endif value="Pasaporte">Pasaporte</option>  
                          <option @if($informacion->id_tipo == 'CE') selected="true"  @endif value="Cedula Extranjera">Cedula Extranjera</option>  
                          <option @if($informacion->id_tipo == 'TI') selected="true"  @endif value="Targeta de identidad">TI</option>  
                        </select>                                                                  
                      </div>
                      <div class="form-group">
                        <label for="Representante">Representante Legal</label>
                        <input type="text" class="form-control" name="representante_legal" id="Representante" placeholder="Representante" value="{{$informacion->representante_legal}}">
                      </div>
                      <div class="form-group">
                        <label for="id_Representante">id Representante</label>
                        <input type="text" class="form-control"  name="id_representante_legal" id="id_Representante" placeholder="id_Representante" value="{{$informacion->id_representante}}">
                      </div>
                      <div class="form-group">
                        <label for="id_Representante">Fecha</label>
                        <input type="text" class="form-control"  name="fecha" id="id_Representante" placeholder="fecha" value="{{$informacion->fecha}}">
                      </div>
                      <div class="form-group">
                        <label for="Telefono">Telefono</label>
                        <input type="text" class="form-control" name="telefono" id="Telefono" placeholder="Telefono" value="{{$informacion->telefono}}">
                      </div>
                      <div class="form-group">
                        <label for="Razon_Social">Razon Social</label>
                        <input type="text" class="form-control" name="razon_social" id="Razon_Social" placeholder="Razon_Social" value="{{$informacion->razon_social}}">
                      </div>
                      <div class="form-group">
                        <label for="per_jur">Per Jur</label>
                        <select class="form-control" name="per_jur" id="per_jur">
                          <option @if($informacion->per_jur == 'Natural') selected="true" @endif value="Natural">Natural</option>  
                          <option @if($informacion->per_jur == 'Juridica') selected="true"  @endif value="Juridica">Juridica</option> 
                        </select>                                                 
                      </div>
                      <div class="form-group">
                        <input type="text" readonly="true" hidden="true" name="departamento" id="departamento" 
                        value="{{$informacion->departamento}}">
                        <input type="text" readonly="true" hidden="true" name="ciudad" id="ciudad" 
                        value="{{$informacion->ciudad}}">
                        <label for="depciudad">Departamento - Ciudad</label>
                        <select class="form-control" name="depciudad" id="depciudad">
                          <optgroup label="Antioquia">
                            <option @if($informacion->ciudad == 'Medellin') selected="true" @endif value="Antioquia-Medellin">Medellin</option>
                          </optgroup>
                          <optgroup label="Risaralda">
                            <option @if($informacion->ciudad == 'Pereira') selected="true"  @endif value="Risaralda-Pereira">Pereira</option> 
                            <option @if($informacion->ciudad == 'Dosquebradas') selected="true"  @endif value="Risaralda-Dosquebradas">Dosquebradas</option> 
                          </optgroup>
                        </select>                          
                      </div>
                      <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="direccion" value="{{$informacion->direccion}}">
                      </div>
                    @endforeach
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </form>
                   
                </div>
                </div>
            
        </div>
    </div>
</div>
@endsection
