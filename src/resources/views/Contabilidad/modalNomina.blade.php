<div class="modal fade" id="mNomina" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myNominaLabel">Nomina</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-14">
                        <label for="fGrDir" class="col-sm-2 control-label">EMPLEADO</label>
                        <div class="col-sm-10 selectEm">
                            {!! Form::select('id_municipio', [], null, [
                                        'class' => 'form-control',
                                        'style' => 'width:100%;',
                                        'placeholder'=>'Municipio',
                                        'required',
                                        'id' => 'sEm'
                                    ]
                                ) !!}
                        </div>
                    </div>
                </div>
                <br>

                <div class="loaderEm"> </div>
                <br>
                <div class="row">
                    <div class="col-sm-14">

                        <label for="fGrGrado" class="col-sm-1 control-label">PAGO</label>
                        <div class="col-sm-3">

                            {!! Form::hidden('nId', null, ['id' => 'nId'])!!}
                            {!! Form::input('number', 'base', 0, [
                                'class' => 'form-control',
                                'min' => '0',
                                'placeholder' => 'Base',
                                'required',
                                'id' => 'base'
                    ]) !!}
                        </div>
                        <label for="fGrIn" class="col-sm-2 control-label">EPS/PENSION</label>
                        <div class="col-sm-3">
                                {!! Form::input('number', 'eps', 0, [
                                    'class' => 'form-control',
                                    'min' => '0',
                                    'placeholder' => 'EPS',
                                    'required',
                                    'id' => 'salud',
                                    'disabled' => true
                        ]) !!}

                        </div>

                        <div class="col-sm-3">
                            {!! Form::input('number', 'pension', 0, [
                                'class' => 'form-control',
                                'min' => '0',
                                'placeholder' => 'PENSION',
                                'required',
                                'id' => 'pension',
                                'disabled' => true
                        ]) !!}
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-14">
                        <label for="fGrGrado" class="col-sm-4 control-label">AUX TRANSPORTE</label>
                        <div class="col-sm-4">


                            {!! Form::input('number', 'aux', 0, [
                                'class' => 'form-control',
                                'min' => '0',
                                'placeholder' => 'Base',
                                'required',
                                'id' => 'aux_transporte'
                    ]) !!}
                        </div>
                        <label for="fGrIn" class="col-sm-1 control-label">ARL</label>
                        <div class="col-sm-3">
                            {!! Form::input('number', 'eps', 0, [
                                'class' => 'form-control',
                                'min' => '0',
                                'placeholder' => 'ARL',
                                'required',
                                'id' => 'arl',
                                'disabled' => true
                    ]) !!}

                        </div>

                    </div>
                </div>
                <br>
                <hr />
                <br>

                <div class="row">
                    <div class="col-sm-14">
                        <label for="fGrGrado" class="col-sm-4 control-label">NETO EMPLEADO</label>
                        <div class="col-sm-3">


                            {!! Form::input('number', 'neto', 0, [
                                'class' => 'form-control',
                                'min' => '0',
                                'placeholder' => 'NETO',
                                'required',
                                'id' => 'neto',
                                'disabled' => true
                    ]) !!}
                        </div>
                        <label for="fGrIn" class="col-sm-2 control-label">TOTAL EMPRESA</label>
                        <div class="col-sm-3">
                            {!! Form::input('number', 'tot', 0, [
                                'class' => 'form-control',
                                'min' => '0',
                                'placeholder' => 'TOTAL',
                                'required',
                                'id' => 'total',
                                'disabled' => true
                    ]) !!}

                        </div>

                    </div>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="genNom">Guardar</button>
            </div>
        </div>
    </div>
</div>