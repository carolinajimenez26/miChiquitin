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
    <link href="{{ asset('assets/css/custom-clients.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme-dark.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link href="{{ asset('assets/css/bootstrap-datepicker3.css') }}" rel="stylesheet">

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

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>

<!-- Script Español Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/i18n/es.js"></script>
<script src="{{ asset('assets/js/jquery.mtz.monthpicker.js') }}"></script>

<!-- SCRIPTS INVENTARIO-->
<script>
            $('#depciudad').click(function(event) {
                //alert('hola');
                //document.getElementById('ciudad').removeAttribute("hidden");
                //document.getElementById('departamento').removeAttribute("hidden");     

                var depciudad = document.getElementById('depciudad').value;
                var arrayDepciudad = depciudad.split("-");  
                //alert(arrayArticulo[0]); 

                document.getElementById('departamento').value = arrayDepciudad[0];
                document.getElementById('ciudad').value = arrayDepciudad[1];
                //document.getElementById('Proveedor').value = arrayArticulo[5];
            });

            //SCRIPT PARA ACTUALIZAR ARTICULO

            $('#updateButton').click(function(event) {
                //alert('hola');
                document.getElementById('showForm').removeAttribute("hidden");
     
                var Articulo = document.getElementById('idArticulo').value;
                var arrayArticulo = Articulo.split(",*");  
                //alert(arrayArticulo[0]); 

                document.getElementById('Nombre').value = arrayArticulo[1];
                document.getElementById('Cantidad').value = arrayArticulo[2];
                document.getElementById('Descripcion').value = arrayArticulo[3];
                document.getElementById('id').value = arrayArticulo[0];
                document.getElementById('Basico').value = arrayArticulo[4];
                //document.getElementById('Proveedor').value = arrayArticulo[5];
            });

            //SCRIPT PARA ACTUALIZAR PEDIDOS
            $('#updateButton2').click(function(event) {
                //alert('hola');
                document.getElementById('showForm2').removeAttribute("hidden");
            
                var pedidos = document.getElementById('idPedido').value;
                var arrayPedido = pedidos.split(",*");  
                //alert(arrayArticulo[0]); 

                document.getElementById('id').value = arrayPedido[0];
                document.getElementById('id_articulo').value = arrayPedido[1];
                //document.getElementById('id_proveedor').value = arrayPedido[2];
                document.getElementById('cantidad').value = arrayPedido[3];
                //alert(arrayPedido[3]);  
                document.getElementById('costo_total').value = arrayPedido[4];
                //alert(arrayPedido[4])
                document.getElementById('estado').value = arrayPedido[5];
                //alert(arrayPedido[5]);
                //alert('hola');
                var x = arrayPedido[4]/arrayPedido[3];
                //alert(x);
                document.getElementById('preciobasico').value = x;
            });

            $('#cantidad').change(function(event) {
                //alert('hola');
                document.getElementById('CostoAMostrar').removeAttribute("hidden");                
                var preciobasico = document.getElementById('preciobasico').value;
                //alert(preciobasico);
                var cantidad = document.getElementById('cantidad').value;
                //alert(preciobasico);
                var preciototal = preciobasico * cantidad;
                //var arrayPedido = pedidos.split(",*");  
                //alert(arrayArticulo[0]); 

                document.getElementById('costo_total').value = preciototal+'.00';
                
                //document.getElementById('Proveedor').value = arrayArticulo[5];
            });

            $('#BtnActualizar').click(function(event){
                var x = document.getElementById('cantidad').value;
                if(x <= 0){
                    alert('Los pedidos con valor negativo no son permitidos. Por favor intente de nuevo.');                   
                }
            });

            $('#BtnAgregar').click(function(event){
                var x = document.getElementById('cantidad').value;
                if(x <= 0){
                    alert('Los pedidos con valor negativo no son permitidos. Por favor intente de nuevo.');                   
                }
            });

            $( function() {
                $( "#searchBar" ).autocomplete({

                    //source: 'http://localhost:8000/articulos/agregar/search'
                    source: 'http://michiquitin.herokuapp.com//articulos/agregar/search'

                });
            } );
            /*-------------------Scripts de Reportes para Articulos-------------------------*/
            
            $( function() {
                $( "#texto2" ).autocomplete({

                    //source: 'http://localhost:8000/reportes/articulos/buscar'
                    source: 'http://michiquitin.herokuapp.com//reportes/articulos/buscar'

                });
            } );
            

            $('#optionsRadiosArticulo1').click(function(event) {
                
                    document.getElementById('campo2').setAttribute("hidden",true);
                    document.getElementById('campo1').removeAttribute("hidden");
                
            });  

            $('#optionsRadiosArticulo2').click(function(event) {
                
                    document.getElementById('campo1').setAttribute("hidden",true);
                     document.getElementById('campo2').removeAttribute("hidden");
                
            });              
</script>

<!-- SCRIPTS INVENTARIO-->

@yield('jsAdicional')
</body>
</html>
