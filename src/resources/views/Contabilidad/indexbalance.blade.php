@extends('layouts.app')

@section('titulo')
    BALANCES
@endsection

@section('content')

    <!--link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"-->

    <div class="container">

        <!doctype html>
        <div class="navbar">
            <ul>
                <li><a class="color" href="{{route('balances.index', ['tipo' => 'dia'])}}">Balance Dia</a></li>
                <li><a class="color" href="{{route('balances.index', ['tipo' => 'mes'])}}">Balance Mes</a></li>
                <li><a  class="color" href="{{route('balances.index', ['tipo' => 'an'])}}">Balance Año</a></li>
            </ul>
        </div>
        <style>
            .navbar {
                width: 100%;
                margin-left: auto ;
                margin-right: auto ;
                background-color: #611824;
            }
            .navbar ul {
                list-style-type: none; /*to remove bullets*/
                text-align: center;
                padding: 0px;
                zoom:1;
                overflow: hidden;
            }
            .navbar li{
                padding: 2px;
                padding-top: 12px;
                width: 150px;
                display:inline-block;
                text-decoration-color: #0c0c0c;

            }

            .color{
                color: white;
            }

            .btn-primary{
                background-color: #611824;
            }
        </style>
        <!--[if IE]>
        <style>
            .navbar li { display:inline; }
        </style>
        <![endif]-->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">


            <!-- Marketing Icons Section -->
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="text-center panel h-100">
                        <h4 class="panel-header well">Balance Dia</h4>
                        <div class="panel-body">
                            <p class="panel-text">
                                Por medio de una busqueda por año obtendrás resultado del balance del año escogido
                            </p>
                        </div>
                        <div class="text-center panel-footer">
                            <a href="{{route('balances.index', ['tipo' => 'dia'])}}" class="btn btn-primary">Ver</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="text-center panel h-100">
                        <h4 class="panel-header well">Balance Mes</h4>
                        <div class="panel-body">
                            <p class="panel-text">
                                Por medio de una busqueda por año y mes obtendrás resultado del balance de se mes escogido
                            </p>
                        </div>
                        <div class="text-center panel-footer">
                            <a href="{{route('balances.index', ['tipo' => 'mes'])}}" class="btn btn-primary">Ver</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="text-center panel h-100">
                        <h4 class="panel-header well">Balance Año</h4>
                        <div class="panel-body">
                            <p class="panel-text">
                                Por medio de una busqueda por año y mes y dia obtendrás resultado del balance de ese dia escogido
                            </p>
                        </div>
                        <div class="text-center panel-footer">
                            <a href="{{route('balances.index', ['tipo' => 'an'])}}" class="btn btn-primary">Ver</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>

@endsection