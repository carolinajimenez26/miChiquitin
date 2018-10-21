@extends('layouts.app')

@section('titulo')
    PAGO PROVEEDORES
    
@endsection

@section('btnAccion')

    <a href="#" class="vPedidos btn btn-success pull-right" miVlr="-1">
        <i class="fa fa-plus-square"></i> Nuevo Pago
    </a>
    <a href="#" class="vPedidosR btn btn-danger pull-right" miVlr="-1">
        <i class="fa fa-search"></i> Pedidos Rechazados
    </a>
@endsection

@section('content')
    @if (Session::get('msg') )
        <div class="alert alert-{{ Session::get('msg')['tipo'] }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {!! Session::get('msg')['msg'] !!}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="col-ls-4 pull-right">
            {!! Form::select('tipo_busqueda', [
                            'fecha_pago'=> 'Fecha de Pago',
                            'fecha_orden' => 'Fecha de Orden'
                            ], null,
                            [
                                    'class' => 'form-control',
                                    'id' => 'tipo_b',
                                ]
                            ) !!}
            </div>
            <div class="col-ls-5 pull-right">
                <button data-act="prev" class="btn btn-default date-range-selector back"><i class="fa fa-chevron-left"></i>
                </button>
                <input type="text" class="data text-center" value="{{$date}}">
                <button data-act="prev" class="btn btn-default date-range-selector up"><i class="fa fa-chevron-right"></i>
                </button>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <table class="table table-bordered table-condensed table-hover" id="tbPagos">
                <thead>
                <tr>
                    <th>Pedido Id</th>
                    <th>Fecha Orden</th>
                    <th>Proveedor</th>
                    <th>Articulo</th>
                    <th>Cantidad</th>
                    <th>Pago Total</th>
                    <th>Fecha Pago</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <div class="loaderIn pull-right"> </div>
                <tbody>
                @foreach($pagos as $pago)
                    @if(!is_null($pago->pedido) or !is_null($pago->pedido->proveedor) or !is_null($pago->pedido->articulo))
                    <tr>
                        <td>{{ $pago->pedido->id }}</td>
                        <td>{{ $pago->fecha_orden }} </td>
                        <td>{{$pago->pedido->proveedor->representante_legal}}</td>
                        <td>
                            {{ $pago->pedido->articulo->nombre}}
                        </td>
                        <td>{{ $pago->pedido->cantidad}} </td>
                        <td>$ {{ $pago->valor_pagar}}</td>
                        <td>{{ $pago->fecha_pago}}</td>
                        <td>
                            {{ $pago->estado}}
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>






    @include('Contabilidad.modalPago')
    @include('Contabilidad.mPedido')
@endsection

@section('jsAdicional')
    <script>

        // VER PEDIDOS PENDIENTES

        $(document).on('click', '.vPedidos', function(e) {
            e.preventDefault();
            $('#mPedidos').modal();
        });

        $(document).on('click', '.vPedidosR', function(e) {
            e.preventDefault();
            $('#mPedidosR').modal();
        });

        //PAGAR PEDIDO
        $(document).on('click', '.pagarP', function(e) {
            e.preventDefault();
            var pedId = $(this).attr('miVlr');
            $.ajax({
                url: $('#urlAct').html() + '/pagar/pedido',
                type: 'post',
                data: {
                    idp : pedId,
                    _token : $('input[name="_token"]').val()
                },
                beforeSend: function() {
                    $('.loaderPed').append('<img id="#imgld" height="70" width="200" src="/assets/img/loader.gif">');
                },
                success:function(r) {
                    $('.loaderPed img').remove();
                    if(r.ok){
                        bootbox.confirm('El pedido fue pagado con exito!', function (resp) {
                            window.location.reload();
                        });
                    }
                    else{
                        bootbox.alert(r.err);
                    }
                }
            });
        });


        //RECHAZAR PEDIDO

        $(document).on('click', '.RechazarP', function(e) {
            e.preventDefault();
            var pedId = $(this).attr('miVlr');
            $.ajax({
                url: $('#urlAct').html() + '/rechazar/pedido',
                type: 'post',
                data: {
                    idp : pedId,
                    _token : $('input[name="_token"]').val()
                },
                beforeSend: function() {
                    $('.loaderPed').append('<img id="#imgld" height="70" width="200" src="/assets/img/loader.gif">');
                },
                success:function(r) {
                    $('.loaderPed img').remove();
                    if(r.ok){
                        bootbox.confirm('El pedido fue rechazado!', function (resp) {
                            window.location.reload();
                        });
                    }
                    else{
                        bootbox.alert(r.err);
                    }
                }
            });
        });

        $('.data').datepicker({
            format: "yyyy-mm",
            startView: 1,
            minViewMode: 1,
            todayBtn: "linked"
        });

        $('.data').datepicker()
            .on('changeDate', function(e) {
                // `e` here contains the extra attributes
                e.preventDefault();
                var date = $('.data').val();
                $.ajax({
                    url: $('#urlAct').html() + '/pagos/ajax',
                    type: 'post',
                    data: {
                        dt : date,
                        tipo : $('#tipo_b').val(),
                        _token : $('input[name="_token"]').val()
                    },
                    beforeSend: function() {
                        $('.loaderIn').append('<img id="#imgld" height="70" width="200" src="/assets/img/loader.gif">');
                    },
                    success:function(respuesta) {
                        console.log(respuesta);
                        var html = '';
                        if (respuesta.ok) {
                            for (i = 0; i < respuesta.dat.length; i++) {
                                html +=
                                    '<tr>'+
                                    '<td class="text-center" >' + respuesta.dat[i].id + '</td>' +
                                    '<td class="text-center">' + respuesta.dat[i].fo + '</td>' +
                                    '<td class="text-center" >' + respuesta.dat[i].pr + '</td>' +
                                    '<td class="text-center" >' + respuesta.dat[i].ar + '</td>' +
                                    '<td class="text-center" >' + respuesta.dat[i].can + '</td>' +
                                    '<td class="text-center" >$ ' + respuesta.dat[i].tot + '</td>' +
                                    '<td class="text-center" >' + respuesta.dat[i].fp + '</td>' +
                                    '<td class="text-center" >' + respuesta.dat[i].estado + '</td>' +
                                    '</tr>';
                            }
                        } else {
                            // mostramos el error generado de la ejecución ajax
                            $('#tbPagos tbody').empty();
                            html = '<tr colspan="6" class="tx16 txC">' +
                                '<td class="danger">' + respuesta.err +'</td>' +
                                '</tr>';
                        }
                        $('.loaderIn img').remove();
                        $('#tbPagos tbody').empty().append(html);
                    }
                });
            });

        $(document).on('click', '.back', function(e) {
            e.preventDefault();
            var date = $('.data').datepicker('getDate');
            var year = date.getFullYear();
            var month = date.getMonth();
            if(month == 0){
                year -= 1;
            }
            $('.data').datepicker('update' , year + '-' + month);
            $.ajax({
                url: $('#urlAct').html() + '/pagos/ajax',
                type: 'post',
                data: {
                    dt : year + '-' + month,
                    tipo : $('#tipo_b').val(),
                    _token : $('input[name="_token"]').val()
                },
                beforeSend: function() {
                    $('.loaderIn').append('<img id="#imgld" height="70" width="200" src="/assets/img/loader.gif">');
                },
                success:function(respuesta) {
                    console.log(respuesta);
                    var html = '';
                    if (respuesta.ok) {
                        for (i = 0; i < respuesta.dat.length; i++) {
                            html +=
                                '<tr>'+
                                '<td class="text-center" >' + respuesta.dat[i].id + '</td>' +
                                '<td class="text-center">' + respuesta.dat[i].fo + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].pr + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].ar + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].can + '</td>' +
                                '<td class="text-center" >$ ' + respuesta.dat[i].tot + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].fp + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].estado + '</td>' +
                                '</tr>';
                        }
                    } else {
                        // mostramos el error generado de la ejecución ajax
                        $('#tbPagos tbody').empty();
                        html = '<tr colspan="6" class="tx16 txC">' +
                            '<td class="danger">' + respuesta.err +'</td>' +
                            '</tr>';
                    }
                    $('.loaderIn img').remove();
                    $('#tbPagos tbody').empty().append(html);
                }
            });
        });

        $('#tipo_b').on('change', function(e) {
            e.preventDefault();
            var date = $('.data').val();

            $.ajax({
                url: $('#urlAct').html() + '/pagos/ajax',
                type: 'post',
                data: {
                    dt : date,
                    tipo : $('#tipo_b').val(),
                    _token : $('input[name="_token"]').val()
                },
                beforeSend: function() {
                    $('.loaderIn').append('<img id="#imgld" height="70" width="200" src="/assets/img/loader.gif">');
                },
                success:function(respuesta) {
                    console.log(respuesta);
                    var html = '';
                    if (respuesta.ok) {
                        for (i = 0; i < respuesta.dat.length; i++) {
                            html +=
                                '<tr>'+
                                '<td class="text-center" >' + respuesta.dat[i].id + '</td>' +
                                '<td class="text-center">' + respuesta.dat[i].fo + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].pr + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].ar + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].can + '</td>' +
                                '<td class="text-center" >$ ' + respuesta.dat[i].tot + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].fp + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].estado + '</td>' +
                                '</tr>';
                        }
                    } else {
                        // mostramos el error generado de la ejecución ajax
                        $('#tbPagos tbody').empty();
                        html = '<tr colspan="6" class="tx16 txC">' +
                            '<td class="danger">' + respuesta.err +'</td>' +
                            '</tr>';
                    }
                    $('.loaderIn img').remove();
                    $('#tbPagos tbody').empty().append(html);
                }
            });
        });

        $(document).on('click', '.up', function(e) {
            e.preventDefault();
            var date = $('.data').datepicker('getDate');
            var year = date.getFullYear();
            var month = date.getMonth();

            month += 2;
            if(month == 13){
                year += 1;
            }
            $('.data').datepicker('update' , year + '-' + month );

            $.ajax({
                url: $('#urlAct').html() + '/pagos/ajax',
                type: 'post',
                data: {
                    dt : year + '-' + month,
                    tipo : $('#tipo_b').val(),
                    _token : $('input[name="_token"]').val()
                },
                beforeSend: function() {
                    $('.loaderIn').append('<img id="#imgld" height="70" width="200" src="/assets/img/loader.gif">');
                },
                success:function(respuesta) {
                    console.log(respuesta);
                    var html = '';
                    if (respuesta.ok) {
                        for (i = 0; i < respuesta.dat.length; i++) {
                            html +=
                                '<tr>'+
                                '<td class="text-center" >' + respuesta.dat[i].id + '</td>' +
                                '<td class="text-center">' + respuesta.dat[i].fo + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].pr + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].ar + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].can + '</td>' +
                                '<td class="text-center" >$ ' + respuesta.dat[i].tot + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].fp + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].estado + '</td>' +
                                '</tr>';
                        }
                    } else {
                        // mostramos el error generado de la ejecución ajax
                        $('#tbPagos tbody').empty();
                        html = '<tr colspan="6" class="tx16 txC">' +
                            '<td class="danger">' + respuesta.err +'</td>' +
                            '</tr>';
                    }
                    $('.loaderIn img').remove();
                    $('#tbPagos tbody').empty().append(html);
                }
            });


        });

        $('#tbPagos').dataTable({
            'bPaginate':     true,
            'bLengthChange': true,
            'bFilter':       true,
            'bSort':         true,
            'bInfo':         false,
            'bAutoWidth':    false,
            'aaSorting':     [[0, 'asc']],
            'language': {
                'zeroRecords':  'No hay registros',
                'infoEmpty':    'No hay registros',
                'search':       'Buscar: ',
            }
        });

        $('#tbPedidos').dataTable({
            'bPaginate':     true,
            'bLengthChange': true,
            'bFilter':       true,
            'bSort':         true,
            'bInfo':         false,
            'bAutoWidth':    false,
            'aaSorting':     [[3, 'asc']],
            'language': {
                'zeroRecords':  'No hay registros',
                'infoEmpty':    'No hay registros',
                'search':       'Buscar: ',
            }
        });

        $('#tbPedidosR').dataTable({
            'bPaginate':     true,
            'bLengthChange': true,
            'bFilter':       true,
            'bSort':         true,
            'bInfo':         false,
            'bAutoWidth':    false,
            'aaSorting':     [[3, 'asc']],
            'language': {
                'zeroRecords':  'No hay registros',
                'infoEmpty':    'No hay registros',
                'search':       'Buscar: ',
            }
        });



    </script>
@endsection