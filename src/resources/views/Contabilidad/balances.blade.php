@extends('layouts.app')

@section('titulo')
    BALANCE
    <?php
    function numhash($n) {
        return (((0x0000FFFF & $n) << 16) + ((0xFFFF0000 & $n) >> 16));
    }
    ?>
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
                <input type="text" class="data text-center" value="{{$date}}">
            </div>

        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <div class="loaderIn"> </div>

            <h4>Esta Fecha</h4>
            <hr/>
            <div class="row">
                <div class="col-sm-14">

                    <label for="fGrGrado" class="col-sm-2 control-label">Vendido</label>
                    <div class="col-sm-2">

                        {!! Form::hidden('tipo', $tipo, ['id' => 'tipo'])!!}
                        {!! Form::input('number', 'base', $vendido, [
                            'class' => 'form-control',
                            'placeholder' => 'Base',
                            'required',
                            'id' => 'vendido',
                            'disabled' => true
                ]) !!}
                    </div>
                    <label for="fGrIn" class="col-sm-2 control-label">Cobrado</label>
                    <div class="col-sm-2">
                        {!! Form::input('number', 'eps', $cobrado, [
                            'class' => 'form-control',

                            'placeholder' => 'EPS',
                            'required',
                            'id' => 'cobrado',
                            'disabled' => true
                ]) !!}

                    </div>
                    <label for="fGrIn" class="col-sm-2 control-label">Por Cobrar</label>
                    <div class="col-sm-2">
                        {!! Form::input('number', 'pension', $cobrar, [
                            'class' => 'form-control',

                            'placeholder' => 'PENSION',
                            'required',
                            'id' => 'cobrar',
                            'disabled' => true
                    ]) !!}
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-sm-14">

                    <label for="fGrGrado" class="col-sm-2 control-label">Total Pagar</label>
                    <div class="col-sm-2">

                        {!! Form::hidden('tipo', $tipo, ['id' => 'tipo'])!!}
                        {!! Form::input('number', 'base', $totalpagar, [
                            'class' => 'form-control',

                            'placeholder' => 'Base',
                            'required',
                            'id' => 'totalpagar',
                            'disabled' => true
                ]) !!}
                    </div>
                    <label for="fGrIn" class="col-sm-2 control-label">Pagado</label>
                    <div class="col-sm-2">
                        {!! Form::input('number', 'eps', $pagado, [
                            'class' => 'form-control',
                            'min' => '0',
                            'placeholder' => 'EPS',
                            'required',
                            'id' => 'pagado',
                            'disabled' => true
                ]) !!}

                    </div>
                    <label for="fGrIn" class="col-sm-2 control-label">Por Pagar</label>
                    <div class="col-sm-2">
                        {!! Form::input('number', 'pension', $pagar, [
                            'class' => 'form-control',
                            'min' => '0',
                            'placeholder' => 'PENSION',
                            'required',
                            'id' => 'pagar',
                            'disabled' => true
                    ]) !!}
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-sm-14">

                    <label for="fGrGrado" class="col-sm-2 control-label">Total</label>
                    <div class="col-sm-2">

                        {!! Form::hidden('tipo', $tipo, ['id' => 'tipo'])!!}
                        {!! Form::input('number', 'base', $total1, [
                            'class' => 'form-control',

                            'placeholder' => 'Base',
                            'required',
                            'id' => 'total1',
                            'disabled' => true
                ]) !!}
                    </div>
                    <label for="fGrIn" class="col-sm-2 control-label">Total</label>
                    <div class="col-sm-2">
                        {!! Form::input('number', 'eps', $total2, [
                            'class' => 'form-control',

                            'placeholder' => 'EPS',
                            'required',
                            'id' => 'total2',
                            'disabled' => true
                ]) !!}

                    </div>
                    <label for="fGrIn" class="col-sm-2 control-label">Total</label>
                    <div class="col-sm-2">
                        {!! Form::input('number', 'pension', $total3, [
                            'class' => 'form-control',

                            'placeholder' => 'PENSION',
                            'required',
                            'id' => 'total3',
                            'disabled' => true
                    ]) !!}
                    </div>
                </div>
            </div>

            <br>
            <hr />
            <h4>Total En Este Momento</h4>
            <hr/>
            <div class="row">
                <div class="col-sm-14">

                    <label for="fGrGrado" class="col-sm-2 control-label">Total Por Cobrar</label>
                    <div class="col-sm-2">

                        {!! Form::hidden('tipo', $tipo, ['id' => 'tipo'])!!}
                        {!! Form::input('number', 'base', $tcobrar, [
                            'class' => 'form-control',
                            'min' => '0',
                            'placeholder' => 'Base',
                            'required',
                            'id' => 'tcobrar',
                            'disabled' => true
                ]) !!}
                    </div>
                    <label for="fGrIn" class="col-sm-2 control-label">Total Por Pagar</label>
                    <div class="col-sm-2">
                        {!! Form::input('number', 'eps', $tpagar, [
                            'class' => 'form-control',
                            'min' => '0',
                            'placeholder' => 'EPS',
                            'required',
                            'id' => 'tpagar',
                            'disabled' => true
                ]) !!}

                    </div>
                    <label for="fGrIn" class="col-sm-2 control-label">Efetivo</label>
                    <div class="col-sm-2">
                        {!! Form::input('number', 'pension', $efectivo, [
                            'class' => 'form-control',
                            'min' => '0',
                            'placeholder' => 'PENSION',
                            'required',
                            'id' => 'efectivo',
                            'disabled' => true
                    ]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection

@section('jsAdicional')
    <script>




        $('.data').datepicker({
            format: "{{$format}}",
            startView: 1,
            minViewMode: {{$min}},
            todayBtn: "linked"
        });

        $('.data').datepicker()
            .on('changeDate', function(e) {
                // `e` here contains the extra attributes
                e.preventDefault();
                var date = $('.data').val();
                $.ajax({
                    url: $('#urlAct').html() + '/balances/ajax',
                    type: 'post',
                    data: {
                        dt : date,
                        tipo : $('#tipo').val(),
                        _token : $('input[name="_token"]').val()
                    },
                    beforeSend: function() {
                        $('.loaderIn').append('<img id="#imgld" height="70" width="200" src="/assets/img/loader.gif">');
                    },
                    success:function(respuesta) {
                        if(respuesta.ok){
                            $('.data').val(respuesta.date);
                            $('#vendido').val(respuesta.vendido);
                            $('#cobrado').val(respuesta.cobrado);
                            $('#cobrar').val(respuesta.cobrar);
                            $('#totalpagar').val(respuesta.totalpagar);
                            $('#pagado').val(respuesta.pagado);
                            $('#pagar').val(respuesta.pagar);
                            $('#total1').val(respuesta.total1);
                            $('#total2').val(respuesta.total2);
                            $('#total3').val(respuesta.total3);
                            $('#tpagar').val(respuesta.tpagar);
                            $('#tcobrar').val(respuesta.tcobrar);
                            $('#efectivo').val(respuesta.efectivo);


                        }
                        else{
                            bootbox.alert(respuesta.err);
                        }
                        console.log(respuesta);
                        $('.loaderIn img').remove();
                    }
                });
            });

    </script>
@endsection