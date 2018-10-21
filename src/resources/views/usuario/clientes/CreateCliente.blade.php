@extends('layouts.app')

@section('titulo')

@endsection

@section('content')
  @if(Session::has('flash_message'))
    <script type="text/javascript">
      alert("{{Session::get('flash_message')}}");
    </script>
  @endif
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
  <div class="container">

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Crear Cliente</div>
          <div class="panel-body">
            <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
              {!!Form::open(['route'=>['Cliente.store'], 'data-toggle'=>'validator', 'role'=>'form', 'method'=>'POST'])!!}
              {{csrf_field()}}
              <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                {!!form::label('name', 'Nombre: ')!!}<br>
                {!!form::text('name',old('name'),['class'=>'col-lx-6 col-md-6', 'placeholder'=>'your name','autofocus required'])!!}
              </div>
              <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                {!!form::label('apellidos','Apellidos: ')!!}<br>
                {!!form::text('apellidos',old('apellidos'),['class'=>'col-lx-6 col-md-6','placeholder'=>'your lastname','autofocus required'])!!}
              </div>
              <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                {!!form::label('edad','Edad: ')!!}<br>
                {!!form::number('edad',old('edad'),['class'=>'col-lx-6 col-md-6','min'=>'18','max'=>'99','autofocus required'])!!}
              </div>
              <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                {!!form::label('email', 'Email: ')!!}<br>
                {!!form::email('email',old('email'),['class'=>'col-lx-6 col-md-6','placeholder'=>'nombre@mozilla.com','autofocus required'])!!}
              </div>
              <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                {!!form::label('telefono', 'Telefono: ')!!}<br>
                {!!form::tel('telefono',old('telefono'),['class'=>'col-lx-6 col-md-6','minlenght'=>'7','placeholder'=>'your numberphone','autofocus required'])!!}
              </div>
              <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                {!!form::label('direccion','Direccion: ')!!}<br>
                {!!form::text('direccion',old('direccion'),['class'=>'col-lx-6 col-md-6', 'placeholder'=>'your address','autofocus required'])!!}
              </div>
              <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                {!!form::label('genero','Genero: ')!!}<br>
                {!! Form::select('genero',['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], null, ['class'=>'col-lx-6 col-md-6','autofocus required'])!!}
              </div>
              <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                {!!form::label('ciudad','Ciudad: ')!!}<br>
                {!!form::text('ciudad',old('ciudad'),['class'=>'col-lx-6 col-md-6','placeholder'=>'your city','autofocus required'])!!}
              </div>
              <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                {!!form::label('credito_maximo','Credito Maximo: ')!!}<br>
                {!!form::number('credito_maximo',old('credito_maximo'),['class'=>'col-lx-6 col-md-6','min'=>'0','max'=>'10000000','autofocus required'])!!}
              </div><!--credito_maximo',0,1000000,null, ['class'=>'col-lx-6 col-md-6','autofocus required'])!!}-->
              <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                {!!form::label('credito_actual','Credito Actual : ')!!}<br>
                {!!form::number('credito_actual',old('credito_actual'),['class'=>'col-lx-6 col-md-6','min'=>'0','max'=>'10000000','autofocus required'])!!}
              </div><!--selectRange('credito_actual', 0, 1000000,null ,['class'=>'col-lx-6 col-md-6','autofocus required'])!!}-->
            </div><br>
            <div class="form-group">
              {!!form::submit('Registrar',['class'=>'btn btn-primary'])!!}
              {!!form::reset('Cancelar',['class'=>'btn btn-boton'])!!}
              {!!form::close()!!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
