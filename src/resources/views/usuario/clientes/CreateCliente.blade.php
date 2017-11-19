  @extends('layouts.app')

  @section('titulo')
      Modulo Cliente, Crear Cliente
  @endsection

  @section('content')
    @if(count($errors)>0)
            <div class="alert alert-warning" role="alert">
               @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                  <script type="text/javascript">
                    alert("{{ $error }}");
                  </script>
                @endforeach
            </div>
        @endif </br>
  {!!Form::open(['route'=>['Cliente.store'], 'data-toggle'=>'validator', 'role'=>'form', 'method'=>'POST'])!!}
    {{csrf_field()}}
      <div class="form-group">
      {!!form::label('Nombre: ')!!}
      {!!form::text('name',old('name'),['class'=>'form', 'placeholder'=>'your name','autofocus required'])!!}
      {!!form::label('Apellidos: ')!!}
      {!!form::text('apellidos',old('apellidos'),['class'=>'form','placeholder'=>'your lastname','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Edad: ')!!}
      {!!form::number('edad',old('edad'),['class'=>'form','min'=>'18','max'=>'99','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Email: ')!!}
      {!!form::email('email',old('email'),['class'=>'form','placeholder'=>'nombre@mozilla.com','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Telefono: ')!!}
      {!!form::tel('telefono',old('telefono'),['class'=>'form','minlenght'=>'7','placeholder'=>'your numberphone','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Direccion: ')!!}
      {!!form::text('direccion',old('direccion'),['class'=>'form', 'placeholder'=>'your address','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Genero: ')!!}
      {!! Form::select('genero',['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], null)!!}
      </div>
      <div class="form-group">
      {!!form::label('Ciudad: ')!!}
      {!!form::text('ciudad',old('ciudad'),['class'=>'form','placeholder'=>'your city','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('credito_maximo: ')!!}
      {!!form::selectRange('credito_maximo',0,500)!!}
      </div>
      <div class="form-group">
      {!!form::label('credito_actual: ')!!}
      {!!form::selectRange('credito_actual', 0, 200)!!}
      </div>
      {!!form::submit('Registrar',['class'=>'btn btn-primary'])!!}
      {!!form::reset('Cancelar',['class'=>'btn btn-boton'])!!}
      {!!form::close()!!}
@endsection