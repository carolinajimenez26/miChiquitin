@extends('layouts.app')

@section('titulo')
  Crear Empleado
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
          <div class="panel-heading">Crear Empleado</div>
          <div class="panel-body">
            <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
              {!!Form::open(['route'=>['Empleado.store'], 'method'=>'POST'])!!}
              {{csrf_field()}}
              <div style="float: left; width: 50%">
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('name','Nombre: ')!!}<br>
                  {!!form::text('name',null,['class'=>'col-lx-8 col-md-8', 'placeholder'=>'your name','autofocus required'])!!}
                </div>
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('apellidos','Apellidos: ')!!}<br>
                  {!!form::text('apellidos',null,['class'=>'col-lx-8 col-md-8','placeholder'=>'your lastname','autofocus required'])!!}
                </div>
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('Edad: ')!!}<br>
                  {!!form::number('edad','18',['class'=>'col-lx-8 col-md-8','min'=>'18','max'=>'99','autofocus required'])!!}
                </div>
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('telefono','Telefono: ')!!}<br>
                  {!!form::tel('telefono',null,['class'=>'col-lx-8 col-md-8','placeholder'=>'your numberphone','autofocus required'])!!}
                </div>
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('email','Email: ')!!}<br>
                  {!!form::email('email',old('email'),['class'=>'col-lx-8 col-md-8','placeholder'=>'nombre@mozilla.com','autofocus required'])!!}
                </div>
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('direccion','Direccion: ')!!}<br>
                  {!!form::text('direccion',null,['class'=>'col-lx-8 col-md-8', 'placeholder'=>'your address','autofocus required'])!!}
                </div>
                <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                  {!!form::label('cargo','Cargo: ')!!}<br>
                  {!!form::select('cargo',['Vendedor' => 'Vendedor', 'Cajero' => 'Cajero', 'Auxiliar' => 'Auxiliar'],null,['class'=>'col-lx-8 col-md-8','autofocus required'])!!}
                </div></div>
                <div style="float: right; width: 50%">
                  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                    {!!form::label('area','Area: ')!!}<br>
                    {!!form::text('area',old('area'),['class'=>'col-lx-8 col-md-8','placeholder'=>'your area','autofocus required'])!!}
                  </div>
                  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                    {!!form::label('tipo','tipo contrato: ')!!}<br>
                    {!!form::text('tipo',null,['class'=>'col-lx-8 col-md-8', 'placeholder'=>'Mensual/Anual/Servicios','autofocus required'])!!}
                  </div>
                  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                    {!!form::label('salario','Salario: ')!!}<br>
                    {!!form::text('salario',null,['class'=>'col-lx-8 col-md-8','placeholder'=>'737000','autofocus required'])!!}
                  </div>
                  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                    {!!form::label('fecha_inicial','Fecha Inicial : ')!!}<br>
                    {!!form::date('fecha_inicial',"2016-07-27", ['class'=>'col-lx-8 col-md-8','autofocus required'])!!}
                  </div>
                  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                    {!!form::label('fecha_final' ,'Fecha Final: ')!!}<br>
                    {!!form::date('fecha_fin',"2018-05-01",['class'=>'col-lx-8 col-md-8','autofocus required'])!!}
                  </div>
                  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                    {!!form::label('credito_maximo: ')!!}<br>
                    {!!form::number('credito_maximo',old('credito_maximo'),['class'=>'col-lx-8 col-md-8','min'=>'0','max'=>'10000000','autofocus required'])!!}
                    <!--!!form::selectRange('credito_maximo',0,900,null,['class'=>'col-lx-8 col-md-8','autofocus required'])!!}-->
                  </div>
                  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                    {!!form::label('credito_actual: ')!!}<br>
                    {!!form::number('credito_actual',old('credito_actual'),['class'=>'col-lx-8 col-md-8','min'=>'0','max'=>'10000000','autofocus required'])!!}
                    <!--!!form::selectRange('credito_actual', 0, 900,null,['class'=>'col-lx-8 col-md-8','autofocus required'])!!}-->
                  </div></div>
                </div>
                <div class="form-group text-center">
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
