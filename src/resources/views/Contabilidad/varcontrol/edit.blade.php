@extends('Contabilidad.varcontrol.template')

@section('content2')
  <div class="container text-center">
    <div class="page-header">
        <h1>
          <i class="fa fa-plus-square-o"></i>
          VALORES <small>[Editar  valor]</small>
        </h1>
      </div>
      <div class="row">
          <div class="col-md-offset-3 col-md-6">
              <div class="page">
                @if (count($errors) > 0 )
                  @include('Contabilidad.varcontrol.errors')
                @endif


              {!! Form::model($Varcontrol, ['route' => ['varcontr.update', $Varcontrol->id]]) !!}
                  <input type="hidden" name='_method' value="PUT">
                    <div class="form-group">
                        <label  for="nombre">Nombre:</label>

                        {!!
                          Form::text(
                            'nombre',
                            null,
                            array(
                              'class'=>'form control',
                              'placeholder' => 'ingresar el nombre de la variable',
                              'autofocus' => 'autofocus'
                            )
                          )
                        !!}
                    </div>

                    <div class="form-group">
                        <label  for="descripcion">Descripcion:</label>

                        {!!
                          Form::textarea(
                            'descripcion',
                            null,
                            array(
                              'class'=>'form control'

                            )
                          )
                        !!}
                    </div>

                    <div class="form-group">
                        <label  for="valor">valor:</label>

                        <input type="number" name="valor" class="form-control" step="any" value="{{$Varcontrol->valor}}">
                    </div>

                    <div class="form-group">
                      {!! Form::submit('Actualizar' , array('class'=>'btn btn-primary'))!!}
                        <a href="{{ route('varcontr.index') }}" class="btn btn-warning">Cancelar</a>
                    </div>
                  {{!! Form::close() !!}}
              </div>
          </div>
      </div>

    </div>
@stop
