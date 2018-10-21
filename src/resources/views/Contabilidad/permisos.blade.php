@extends('layouts.app')

@section('titulo')
    PAGO PROVEEDORES
    <?php
    function numhash($n) {
        return (((0x0000FFFF & $n) << 16) + ((0xFFFF0000 & $n) >> 16));
    }
    ?>
@endsection

@section('btnAccion')

    <a href="#" class="mPer btn btn-success pull-right" miVlr="-1">
        <i class="fa fa-search"></i> Agregar Empleado con Permiso
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

            <table class="table table-bordered table-condensed table-hover" id="tbPermisos">
                <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Nombre(s)</th>
                    <th class="text-center">Apellidos</th>
                    <th class="text-center">Eliminar Permiso</th>
                </tr>
                </thead>
                <div class="loaderIn pull-right"> </div>
                <tbody>
                @foreach($permisos as $permiso)
                    @if(!is_null($permiso->empleado) or !is_null($permiso->empleado->user))

                        <tr>
                            <td class="text-center"><?php
                                echo numHash($permiso->id_user);
                                ?>
                            </td>
                            <td class="text-center">{{ $permiso->empleado->user->email }} </td>
                            <td class="text-center">{{$permiso->empleado->user->name}}</td>
                            <td class="text-center">
                                {{ $permiso->empleado->user->apellidos}}
                            </td>
                            <td class="text-center">
                                <a href="#" class="delPer btn btn-danger btn-sm" miVlr="{{$permiso->id_user}}">
                                    <span class="hidden-sm hidden-xs">Eliminar </span>
                                    <span class="fa fa-trash-o"></span>
                                </a>
                            </td>
                        </tr>
                        @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>




    @include('Contabilidad.modalPermiso')
@endsection

@section('jsAdicional')
    <script>


        $(document).on('click', '.mPer', function(e) {
            e.preventDefault();
            $('#sEm').empty();
            $('#mPermiso').modal();
        });

        $(document).on('click', '.delPer', function(e) {
            e.preventDefault();
            var perId = $(this).attr('miVlr');
            bootbox.confirm("Está seguro que desea eliminar el permiso a este Empleado?", function(r) {
                if (r) {

                    console.log(perId);
                    $.ajax({
                        url: $('#urlAct').html() + '/permisos/del',
                        type: 'post',
                        data: {
                            idp :  perId,
                            _token : $('input[name="_token"]').val()
                        },
                        beforeSend: function() {
                            $('.loaderIn').append('<img id="#imgld" height="70" width="200" src="/assets/img/loader.gif">');
                        },
                        success:function(r) {
                            $('.loaderIn img').remove();
                            if(r.ok){
                                bootbox.confirm('El permiso fue eliminado exitosamente!', function (resp) {
                                    window.location.reload();
                                });
                            }
                            else{
                                bootbox.alert(r.err);
                            }
                        }
                    });
                }
            });
        });

        $(document).on('click', '#addPer', function(e) {
            e.preventDefault();
            $.ajax({
                url: $('#urlAct').html() + '/permisos/add',
                type: 'post',
                data: {
                    idp:  $('#sEm').val(),
                    _token : $('input[name="_token"]').val()
                },
                beforeSend: function() {
                    $('.loaderPer').append('<img id="#imgld" height="70" width="200" src="/assets/img/loader.gif">');
                },
                success:function(r) {
                    $('.loaderPer img').remove();
                    if(r.ok){
                        bootbox.confirm('El permiso fue agregado exitosamente!', function (resp) {
                            window.location.reload();
                        });
                    }
                    else{
                        bootbox.alert(r.err);
                    }
                }
            });
        });

        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

        $("#sEm").select2({
            dropdownParent: $("#mPermiso"),
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

        $('#tbPermisos').dataTable({
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



    </script>
@endsection