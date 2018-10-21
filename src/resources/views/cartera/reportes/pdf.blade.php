<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Fecha</td>
                <td>Documento</td>
                <td>Usuario</td>
                <td>Factura</td>
                <td>Valor pagado</td>
                <td>Valor a pagar</td>
                <td>Plazo crédito</td>
                <td>Estado</td>
                <!--td colspan="2"></td-->
            </tr>
        </thead>
        <tbody>
        @foreach($deudas as $deuda)
            <tr>
                <td>{{ $deuda->created_at }}</td>
                <td>{{ $deuda->user->id }}</td>
                <td>{{ $deuda->user->name }}</td><!--td>{{ $deuda->id_usuario }}</td-->
                <td>{{ $deuda->factura->fecha }}</td>
                <td>{{ $deuda->valor_pagado }}</td>
                <td>{{ $deuda->valor_a_pagar }}</td>
                <td>{{ $deuda->plazo_credito }}</td>
                <td>{{ $deuda->estado }}</td>
               
            </tr>
        @endforeach
        </tbody>
    </table>
  </body>
</html>