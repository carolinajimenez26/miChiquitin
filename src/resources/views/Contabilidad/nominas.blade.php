@extends('layouts.app')

@section('titulo')
    NOMINAS
    <?php
    function numhash($n) {
        return (((0x0000FFFF & $n) << 16) + ((0xFFFF0000 & $n) >> 16));
    }
    ?>
@endsection

@section('btnAccion')
    <a href="#" class="modalPagarN btn btn-success pull-right" miVlr="-1">
        <i class="fa fa-money"></i> Pagar Nominas
    </a>
    <a href="#" class="verNomina btn btn-default pull-right" miVlr="-1">
        <i class="fa fa-plus-square"></i> Nueva Nomina
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
            <div class="pull-right">
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

            <table class="table table-bordered table-condensed table-hover" id="tbNominas">
                <thead>
                <tr>
                    <th>Id Empleado</th>
                    <th>Email</th>
                    <th>Nombres</th>
                    <th>Appellidos</th>
                    <th>Fecha Prenomina</th>
                    <th>Fecha Pago</th>
                    <th>Pago Total</th>
                    <th>Estado</th>
                    <th>Ver</th>
                </tr>
                </thead>
                <tbody>
                @foreach($nominas as $nomina)
                    @if(!is_null($nomina->empleado) or !is_null($nomina->empleado->user))
                        <tr>
                            <td>
                                <?php
                                echo numHash($nomina->empleado->user->id);
                                ?>
                            </td>
                            <td>{{ $nomina->empleado->user->email }}</td>
                            <td>{{ $nomina->empleado->user->name }} </td>
                            <td>{{$nomina->empleado->user->apellidos}}</td>
                            <td>
                                {{ $nomina->fecha_prenomina}}
                            </td>
                            <td>@if(!is_null($nomina->fecha_pago))
                                    {{$nomina->fecha_pago}}
                            @endif</td>
                            <td>{{$nomina->base + ( 3 * $nomina->salud) + $nomina->aux_transporte}}</td>
                            <td>
                                {{ $nomina->estado}}
                            </td>
                            <td>
                                <a href="#" class="verNomina btn btn-success"
                                   miVlr="{{$nomina->id}}" >
                                    <span class="fa fa-search"></span> Ver
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <div class="loaderIn"> </div>
        </div>
    </div>






    @include('Contabilidad.modalNomina')
    @include('Contabilidad.modalPagarNomina')
@endsection

@section('jsAdicional')
    <script>

        $(document).on('click', '.pagarN', function(e) {
            e.preventDefault();
            var pedId = $(this).attr('miVlr');
            $.ajax({
                url: $('#urlAct').html() + '/pagar/nomina',
                type: 'post',
                data: {
                    idp: pedId,
                    _token : $('input[name="_token"]').val()
                },
                beforeSend: function() {
                    $('.loaderPed').append('<img id="#imgld" height="70" width="200" src="/assets/img/loader.gif">');
                },
                success:function(r) {
                    $('.loaderPed img').remove();
                    if(r.ok){
                        bootbox.confirm('La nomida fue pagado con exito!', function (resp) {
                            window.location.reload();
                        });
                    }
                    else{
                        bootbox.alert(r.err);
                    }
                }
            });
        });

        $(document).on('click', '.modalPagarN', function(e) {
            e.preventDefault();
            $('#mNominasP').modal();
        });

        $(document).on('click', '.verNomina', function(e) {
            e.preventDefault();
            $('#nId').val($(this).attr('miVlr'));
            $('#base').val('');
            $('#sEm').empty();
            $('#salud').val('');
            $('#pension').val('');
            $('#arl').val('');
            $('#aux_transporte').val('');
            $('#neto').val('');
            $('#total').val('');
            if($(this).attr('miVlr') < 0){
                $('#myNominaLabel').html('Crear : Pre-nomina');
                $('#sEm').prop('disabled', false);
                $('#mNomina').modal();
            }
            else{
                $('#myNominaLabel').html('Prenomina');
                $.ajax({
                    url: $('#urlAct').html() + '/nomina/get',
                    type: 'post',
                    data: {
                        idn : $('#nId').val(),
                        _token : $('input[name="_token"]').val()
                    },
                    beforeSend: function() {
                        $('.loaderEm').append('<img id="#imgld" height="50" width="50" src="/assets/img/loaderb.gif">');
                        $('#mNomina').modal();
                    },
                    success:function(r) {
                        if(r.ok){
                            console.log(r);
                            $('#myNominaLabel').html('NOMINA: ' + r.empleado);
                            $('#sEm').prop('disabled', true);
                            $('#base').val(r.base);
                            $('#salud').val(r.aporte);
                            $('#pension').val(r.aporte);
                            $('#arl').val(r.aporte);
                            $('#aux_transporte').val(r.aux_transporte);
                            $('#neto').val(r.neto);
                            $('#total').val(r.total);

                        }
                        else{
                            bootbox.alert(r.err);
                        }
                        $('.loaderEm img').remove();
                    }
                });
            }

        });

        $(document).on('click', '#genNom', function(e) {
            e.preventDefault();
            //var valorTxt = $('#mEjmTxt').val();

            if ($('#base').val() == '') {
                alert('Porfavor entre una base');
                return false;
            }

            if ($('#aux_transporte').val() == '') {
                alert("Porfavor entre aux transporte");
                return false;
            }
            if ($('#neto').val() == null) {
                alert("Porfavor revisa datos");
                return false;
            }
            if ($('#total').val() == '') {
                alert("Porfavor revisa datos");
                return false;
            }

            if ($('#sEm').val() == '') {
                alert("Porfavor entre empleador");
                return false;
            }



            $.ajax({
                url: $('#urlAct').html() + '/nominas/genNom',
                type: 'post',
                data: {
                    id : $('#nId').val(),
                    id_empleado : $('#sEm').val(),
                    base : $('#base').val(),
                    salud : $('#salud').val(),
                    pension : $('#pension').val(),
                    arl : $('#arl').val(),
                    neto : $('#neto').val(),
                    aux_transporte : $('#aux_transporte').val(),
                    _token : $('input[name="_token"]').val()
                },
                beforeSend: function() {
                    $('.loaderEm').append('<img id="#imgld" height="50" width="50" src="/assets/img/loader.gif">');
                },
                success:function(r) {
                    if(r.ok){
                        console.log(r);
                        window.location.reload();
                    }
                    else{
                        bootbox.alert(r.err);
                    }
                    $('.loaderEm img').remove();
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
                    url: $('#urlAct').html() + '/nominas/ajax',
                    type: 'post',
                    data: {
                        dt : date,
                        _token : $('input[name="_token"]').val()
                    },
                    beforeSend: function() {
                        $('#tbNominas tbody').empty();
                        $('.loaderIn').append('<img id="#imgld" height="70" width="200" src="/assets/img/loader.gif">');
                    },
                    success:function(respuesta) {
                        console.log(respuesta);
                        var html = '';
                        if (respuesta.ok) {
                            for (i = 0; i < respuesta.dat.length; i++) {

                                html +=
                                    '<tr class="text-center" id="es' + respuesta.dat[i].id +'">'+
                                    '<td class="text-center" >' +
                                    respuesta.dat[i].id3 +
                                    '</td>' +
                                    '<td class="text-center" >' +
                                    respuesta.dat[i].id2 +
                                    '</td>' +
                                    '<td class="text-center" >' + respuesta.dat[i].nom + '</td>' +
                                    '<td class="text-center">' + respuesta.dat[i].app + '</td>' +
                                    '<td class="text-center" >' + respuesta.dat[i].f_pre + '</td>' +
                                    '<td class="text-center" >' + respuesta.dat[i].f_pag + '</td>' +
                                    '<td class="text-center" >' + respuesta.dat[i].tot + '</td>' +
                                    '<td class="text-center" >' + respuesta.dat[i].estado + '</td>' +
                                    '<td class="text-center">' +
                                    '<a href="#" class="verNomina btn btn-success" ' +
                                    'miVlr="' + respuesta.dat[i].id  + '">'  +
                                    '<span class="fa fa-search"></span> Ver' +
                                    '</a>' +
                                    '</td>' +
                                    '</tr>';
                            }
                        } else {
                            // mostramos el error generado de la ejecución ajax
                            $('#tbNominas tbody').empty();
                            html = '<tr colspan="6" class="tx16 txC">' +
                                '<td class="danger">' + respuesta.err +'</td>' +
                                '</tr>';
                        }
                        $('.loaderIn img').remove();
                        $('#tbNominas tbody').empty().append(html);
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
                url: $('#urlAct').html() + '/nominas/ajax',
                type: 'post',
                data: {
                    dt : year + '-' + month,
                    _token : $('input[name="_token"]').val()
                },
                beforeSend: function() {
                    $('#tbNominas tbody').empty();
                    $('.loaderIn').append('<img id="#imgld" height="70" width="200" src="/assets/img/loader.gif">');
                },
                success:function(respuesta) {
                    console.log(respuesta);
                    var html = '';
                    if (respuesta.ok) {
                        for (i = 0; i < respuesta.dat.length; i++) {

                            html +=
                                '<tr class="text-center" id="es' + respuesta.dat[i].id +'">'+
                                '<td class="text-center" >' +
                                respuesta.dat[i].id3 +
                                '</td>' +
                                '<td class="text-center" >' +
                                respuesta.dat[i].id2 +
                                '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].nom + '</td>' +
                                '<td class="text-center">' + respuesta.dat[i].app + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].f_pre + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].f_pag + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].tot + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].estado + '</td>' +
                                '<td class="text-center">' +
                                '<a href="#" class="verNomina btn btn-success" ' +
                                'miVlr="' + respuesta.dat[i].id  + '">'  +
                                '<span class="fa fa-search"></span> Ver' +
                                '</a>' +
                                '</td>' +
                                '</tr>';
                        }
                    } else {
                        // mostramos el error generado de la ejecución ajax
                        $('#tbNominas tbody').empty();
                        html = '<tr colspan="6" class="tx16 txC">' +
                            '<td class="danger">' + respuesta.err +'</td>' +
                            '</tr>';
                    }
                    $('.loaderIn img').remove();
                    $('#tbNominas tbody').empty().append(html);
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
                url: $('#urlAct').html() + '/nominas/ajax',
                type: 'post',
                data: {
                    dt : year + '-' + month,
                    _token : $('input[name="_token"]').val()
                },
                beforeSend: function() {
                    $('#tbNominas tbody').empty();
                    $('.loaderIn').append('<img id="#imgld" height="70" width="200" src="/assets/img/loader.gif">');
                },
                success:function(respuesta) {
                    console.log(respuesta);
                    var html = '';
                    if (respuesta.ok) {
                        for (i = 0; i < respuesta.dat.length; i++) {

                            html +=
                                '<tr class="text-center" id="es' + respuesta.dat[i].id +'">'+
                                '<td class="text-center" >' +
                                respuesta.dat[i].id3 +
                                '</td>' +
                                '<td class="text-center" >' +
                                respuesta.dat[i].id2 +
                                '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].nom + '</td>' +
                                '<td class="text-center">' + respuesta.dat[i].app + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].f_pre + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].f_pag + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].tot + '</td>' +
                                '<td class="text-center" >' + respuesta.dat[i].estado + '</td>' +
                                '<td class="text-center">' +
                                '<a href="#" class="verNomina btn btn-success" ' +
                                'miVlr="' + respuesta.dat[i].id  + '">'  +
                                '<span class="fa fa-search"></span> Ver' +
                                '</a>' +
                                '</td>' +
                                '</tr>';
                        }
                    } else {
                        // mostramos el error generado de la ejecución ajax
                        $('#tbNominas tbody').empty();
                        html = '<tr colspan="6" class="tx16 txC">' +
                            '<td class="danger">' + respuesta.err +'</td>' +
                            '</tr>';
                    }
                    $('.loaderIn img').remove();
                    $('#tbNominas tbody').empty().append(html);
                }
            });


        });

        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

        $("#sEm").select2({
            dropdownParent: $("#mNomina"),
            placeholder : 'Usuario Email',
            ajax: {
                url: $('#urlAct').html() + '/nominas/empleado',
                type: 'post',
                dataType: 'json',
                delay: 10,
                data: function (params) {
                    return {
                        _token : $('input[name="_token"]').val(),
                        q: params.term,
                        page: 30
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            minimumInputLength: 3
        });

        $('#base').on('change', function(e) {
            var neto = parseFloat($('#base').val()) - ( 2 * parseFloat($('#arl').val())) + parseFloat($('#aux_transporte').val());
            var total = parseFloat($('#base').val()) + ( 3 * parseFloat($('#arl').val())) + parseFloat($('#aux_transporte').val());
            $('#neto').val(neto);
            $('#total').val(total);
            console.log(neto);
        });

        $('#aux_transporte').on('change', function(e) {
            var neto = parseFloat($('#base').val()) - ( 2 * parseFloat($('#arl').val())) + parseFloat($('#aux_transporte').val());
            var total = parseFloat($('#base').val()) + ( 3 * parseFloat($('#arl').val())) + parseFloat($('#aux_transporte').val());
            $('#neto').val(neto);
            $('#total').val(total);
        });

        $('#sEm').on('change', function(e) {
            $.ajax({
                url: $('#urlAct').html() + '/nomina/datos',
                type: 'post',
                data: {
                    ide : $('#sEm').val(),
                    _token : $('input[name="_token"]').val()
                },
                beforeSend: function() {
                    $('.loaderEm').append('<img id="#imgld" height="70" width="200" src="/assets/img/loader.gif">');
                },
                success:function(r) {
                    $('.loaderEm img').remove();
                    if(r.ok){
                        $('#base').val(r.base);
                        $('#salud').val(r.aporte);
                        $('#pension').val(r.aporte);
                        $('#arl').val(r.aporte);
                        $('#aux_transporte').val(r.aux_transporte);
                        $('#neto').val(r.neto);
                        $('#total').val(r.total);
                    }
                    else{
                        bootbox.alert(r.err);
                    }
                }
            });
        });

        $('#tbNominas').dataTable({
            'bPaginate':     false,
            'bLengthChange': false,
            'bFilter':       true,
            'bSort':         true,
            'bInfo':         false,
            'bAutoWidth':    false,
            'aaSorting':     [[0, 'asc']],
            'language': {
                'zeroRecords':  'No hay registros',
                'infoEmpty':    'No hay registros',
                'search':       'Buscar: '
            }
        });

        $('#tbNominasP').dataTable({
            'bPaginate':     false,
            'bLengthChange': false,
            'bFilter':       true,
            'bSort':         true,
            'bInfo':         false,
            'bAutoWidth':    false,
            'aaSorting':     [[0, 'asc']],
            'language': {
                'zeroRecords':  'No hay registros',
                'infoEmpty':    'No hay registros',
                'search':       'Buscar: '
            }
        });
    </script>
@endsection