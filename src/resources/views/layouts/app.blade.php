<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Soluciones dys') }}</title>

    <!-- Styles -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dp3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/componentes.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme-dark.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="page-content-white page-header-fixed ">
<div class="hide" id="urlAct">{{ url('/') }}</div>
<div class="page-wrapper">
    <div class="page-header navbar navbar-fixed-top">
        <div class="page-header-inner container">
            <div class="logo-app">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/chiquitin.png') }}" alt="logo" width="160" height="30">
                </a>
                <div class="menu-toggler sidebar-toggler"><span></span></div>
            </div>
            <a href="javascript:;" class="menu-toggler responsive-toggler"
               data-toggle="collapse" data-target=".navbar-collapse">
                <span></span>
            </a>
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
                           data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('fLogout').submit();">
                                    <i class="fa fa-power-off"></i> Cerrar Sesión
                                </a>

                                <form id="fLogout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
    <div class="container">
        <div class="page-container">
            @include('layouts.sidemenu')

            <div class="page-content-wrapper">
                <div class="page-content" style="min-height:1049px;">
                    <div class="page-bar">
                        <h2 class="page-title"> @yield('titulo')
                            @yield('btnAccion')
                        </h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12" >
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-footer">
            <div class="container">
                    <span class="page-footer-inner"> 2017 © Proyecto Ingeneria Software III -
                        <a target="_blank" href="#">Mi Chiquitin</a>
                    </span>
            </div>
        </div>

    </div>
</div>



<!-- Scripts -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/dp.min.js') }}"></script>
<script src="{{ asset('assets/js/dp-es.js') }}"></script>
<script src="{{ asset('assets/js/bootbox.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/layout.js') }}"></script>
<!-- Script Español Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/i18n/es.js"></script>

@yield('jsAdicional')
</body>
</html>
