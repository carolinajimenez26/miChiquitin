<style>
    #fullModal {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }

    #fullCont {
        height: auto;
        min-height: 100%;
        border-radius: 0;
    }
</style>

<div class="modal fade" id="mNominasP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div id="fullModal" class="modal-dialog" role="document">
        <div id="fullCont" class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pedidos Por Pagar</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                        <table class="table table-bordered table-condensed table-hover" id="tbNominasP">
                            <thead>
                            <tr>
                                <th class="text-center">Id Empleado</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Nombres</th>
                                <th class="text-center">Appellidos</th>
                                <th class="text-center">Fecha Prenomina</th>
                                <th class="text-center">Fecha Pago</th>
                                <th class="text-center">Pago Total</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Pagar</th>
                            </tr>
                            </thead>
                            <div class="loaderPed pull-right"> </div>
                            <tbody>
                            @foreach($nominasP as $nominaP)
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        echo numHash($nominaP->empleado->user->id);
                                        ?>
                                    </td>
                                    <td class="text-center">{{ $nominaP->empleado->user->email }}</td>
                                    <td class="text-center">{{ $nominaP->empleado->user->name }} </td>
                                    <td class="text-center">{{$nominaP->empleado->user->apellidos}}</td>
                                    <td class="text-center">
                                        {{ $nominaP->fecha_prenomina}}
                                    </td>
                                    <td class="text-center">@if(!is_null($nominaP->fecha_pago))
                                            {{$nominaP->fecha_pago}}
                                        </td>@endif
                                    <td class="text-center">{{$nominaP->base + ( 3 * $nominaP->salud) + $nominaP->aux_transporte}}</td>
                                    <td class="text-center">
                                        {{ $nominaP->estado}}
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="pagarN btn btn-success"
                                           miVlr="{{$nominaP->id}}" >
                                            <span class="fa fa-money"></span> Pagar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="mGrOk">Guardar</button>
            </div>
        </div>
    </div>
</div>