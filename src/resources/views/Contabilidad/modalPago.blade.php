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

<div class="modal fade" id="mPedidos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div id="fullModal" class="modal-dialog" role="document">
        <div id="fullCont" class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pedidos Por Pagar</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                            <table class="table table-bordered table-condensed table-hover" id="tbPedidos">
                                <thead>
                                <tr>
                                    <th class="text-center">Pedido Id</th>
                                    <th class="text-center">Articulo</th>
                                    <th class="text-center">Proveedor</th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Costo</th>
                                    <th class="text-center">Rechazar</th>
                                    <th class="text-center">Pagar</th>
                                </tr>
                                </thead>
                                <div class="loaderPed pull-right"> </div>
                                <tbody>
                                @foreach($pedidos as $pedido)
                                        <tr>
                                            <td>{{ $pedido->id }}</td>
                                            <td class="text-center">{{ $pedido->articulo->nombre}} </td>
                                            <td class="text-center">{{$pedido->proveedor->representante_legal}}</td>
                                            <td class="text-center">{{$pedido->fecha}}</td>
                                            <td class="text-center">
                                                {{ $pedido->cantidad}}
                                            </td>
                                            <td class="text-center">$ {{ $pedido->costo_total}} </td>

                                            <td class="text-center">
                                                <a href="#" class="RechazarP btn btn-danger"
                                                   miVlr="{{$pedido->id}}" >
                                                    <span class="fa fa-ban"></span> Rechazar
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="pagarP btn btn-success"
                                                   miVlr="{{$pedido->id}}" >
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