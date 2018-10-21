@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Abonar a la Deuda: Nombre del usuario</h3>
      <h3>Deuda total ${{ number_format($deuda->valor_a_pagar)}}</h3>
      <h3>Valor pagado ${{ number_format($deuda->valor_pagado)}}</h3>
      @if (count($errors)>0)
      <div class="alert alert-danget">
        <ul>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif
    </div>
  </div>
      <!--Patch para enviar al edit -->
      {!!Form::model($deuda,['method'=>'PATCH', 'route'=>['deuda.update',$deuda->id_deuda],'files'=>'true'])!!}
      {{Form::token()}}
      <div>
        <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
        <div class="form-group">
          <br/>
          <label for="abono">El valor que desea abonar a la deuda</label>
          <input type="text" name="abono" required placeholder="000" class="form-control">
        </div>
      </div>
      

      <div class="col-lg-8 col-sm-8 col-md-8  col-xs-12">
        <div class="form-group">

          <button class="btn btn-primary" type="submit">Guardar</button>
          <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
      </div>
    </div>  

      {!!Form::close()!!}

@endsection
