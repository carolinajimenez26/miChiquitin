
@extends('layouts.app')

@section('titulo')
  Contrato del Empleado: {{$usuario->name}} {{$usuario->apellidos}}
@endsection

@section('content')
  <div class="col-sm-8 col-xs well">
    <div class="panel panel-info">
      <div class="panel-heading">
        <p class="panel-title "> Contrado de {{$usuario->name}} {{$usuario->apellidos}}</p>
      </div>
      <div class="panel body">
        <dl>
          <dt class="bg-success">Nombre: </dt>
          <dd>-  {{$usuario->name}}</dd>
          <dt class="bg-success">Apellidos: </dt>
          <dd>-   {{$usuario->apellidos}}</dd>
          <dt class="bg-success">Tipo Salario:
            <dd>-  {{$contrato->tipo}}</dd>
            <dt class="bg-success">Remuneracion: </dt>
            <dd>-  {{$contrato->salario}}</dd>
            <dt class="bg-success">Fecha Inicial del contrato: </dt>
            <dd>-  {{$contrato->fecha_inicial}}</dd>
            <dt class="bg-success">Fecha Final del contrato: </dt>
            <dd>-  {{$contrato->fecha_fin}}</dd>
            <dt class="bg-success">Credito Actual para el Empleado: </dt>
            <dd>-   {{$usuario->credito_actual}}</dd>
            <dt class="bg-success">Credito Maximo Para el Empleado: </dt>
            <dd>-  {{$usuario->credito_maximo}}</dd>
            <small class="pull-right">
              <a href="{{route ('Contrato.edit',['contrato' => $contrato->id_contrato])}}" class="btn btn-info">Edit</a>
            </small>
          </dl>
        </div></div>
      </div>
    @endsection
