  @extends('layouts.app')

  @section('titulo')
    Editar la informacion del empleado {{$usuario->name}} {{$usuario->apellidos}}
      @endsection

  @section('content')

    @if(Session::has('flash_message'))
      <script type="text/javascript">
        alert("{{Session::get('flash_message')}}");
      </script>
    @endif
  {!!Form::open(['route' => ['Empleado.update','empleado' => $empleado->id_empleado], 'method'=>'POST'])!!}
    {{ method_field('PUT') }}
    {{csrf_field()}}

    <div class="container">

      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Agregar Un Cliente</div>
            <div class="panel-body">
              <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                {!!Form::open(['route'=>['Empleado.store'], 'method'=>'POST'])!!}
                {{csrf_field()}}
                <div style="float: left; width: 50%">
                  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                    {!!form::label('name','Nombre: ')!!}<br>
                    {!!form::text('name',$usuario->name,['class'=>'col-lx-8 col-md-8', 'placeholder'=>'your name','autofocus required'])!!}
                  </div>
                  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                    {!!form::label('apellidos','Apellidos: ')!!}<br>
                    {!!form::text('apellidos',$usuario->apellidos,['class'=>'col-lx-8 col-md-8','placeholder'=>'your lastname','autofocus required'])!!}
                  </div>
                  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                    {!!form::label('Edad: ')!!}<br>
                    {!!form::number('edad',$usuario->edad,['class'=>'col-lx-8 col-md-8','min'=>'18','max'=>'99','autofocus required'])!!}
                  </div>
                  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                    {!!form::label('telefono','Telefono: ')!!}<br>
                    {!!form::tel('telefono',$telefono->telefono,['class'=>'col-lx-8 col-md-8','placeholder'=>'your numberphone','autofocus required'])!!}
                  </div>
                  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                    {!!form::label('email','Email: ')!!}<br>
                    {!!form::email('email',$usuario->email,['class'=>'col-lx-8 col-md-8','placeholder'=>'nombre@mozilla.com','autofocus required'])!!}
                  </div>
                  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                    {!!form::label('direccion','Direccion: ')!!}<br>
                    {!!form::text('direccion',$usuario->direccion,['class'=>'col-lx-8 col-md-8','autofocus required'])!!}
                  </div>
                  <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                    {!!form::label('cargo','Cargo: ')!!}<br>
                    {!!form::select('cargo',['Vendedor' => 'Vendedor', 'Cajero' => 'Cajero', 'Auxiliar' => 'Auxiliar'],$empleado->cargo,['class'=>'col-lx-8 col-md-8','autofocus required'])!!}
                  </div></div>
                  <div style="float: right; width: 50%">
                    <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                      {!!form::label('area','Area: ')!!}<br>
                      {!!form::text('area',$empleado->area,['class'=>'col-lx-8 col-md-8','autofocus required'])!!}
                    </div>
                    <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                      {!!form::label('tipo','tipo contrato: ')!!}<br>
                      {!!form::text('tipo',$contrato->tipo,['class'=>'col-lx-8 col-md-8', 'placeholder'=>'Mensual/Anual/Servicios','autofocus required'])!!}
                    </div>
                    <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                      {!!form::label('salario','Salario: ')!!}<br>
                      {!!form::text('salario',$contrato->salario,['class'=>'col-lx-8 col-md-8','autofocus required'])!!}
                    </div>
                    <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                      {!!form::label('fecha_inicial','Fecha Inicial : ')!!}<br>
                      {!!form::date('fecha_inicial',$contrato->fecha_fin,['class'=>'col-lx-8 col-md-8','autofocus required'])!!}
                    </div>
                    <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                      {!!form::label('fecha_final' ,'Fecha Final: ')!!}<br>
                      {!!form::date('fecha_fin',$contrato->fecha_inicial,['class'=>'col-lx-8 col-md-8','autofocus required'])!!}
                    </div>
                    <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                      {!!form::label('credito_maximo','Credito Maximo: ')!!}<br>
                      {!!form::number('credito_maximo',$usuario->credito_maximo,['class'=>'col-lx-8 col-md-8','min'=>'0','max'=>'10000000','autofocus required'])!!}
                      <!--!!form::selectRange('credito_maximo',0,900,$usuario->credito_maximo,['class'=>'col-lx-8 col-md-8','autofocus required'])!!}-->
                    </div>
                    <div class="col-md-12 col-lx-12 col-lg-12 col-sm-12">
                      {!!form::label('credito_actual','Credito Maximo: ')!!}<br>
                      {!!form::number('credito_actual',$usuario->credito_actual,['class'=>'col-lx-8 col-md-8','min'=>'0','max'=>'10000000','autofocus required'])!!}
                      <!--!!form::selectRange('credito_actual', 0, 900,$usuario->credito_actual,['class'=>'col-lx-8 col-md-8','autofocus required'])!!}-->
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
        </div>$usuario->
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
@endsection
