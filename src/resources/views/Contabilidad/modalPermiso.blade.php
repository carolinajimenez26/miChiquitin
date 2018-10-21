<div class="modal fade" id="mPermiso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

                <div class="loaderPer"> </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="addPer">Guardar</button>
            </div>
        </div>
    </div>
</div>