<!DOCTYPE html>
<html><body>
        <H1 align="center">PAZ Y SALVO</H1>
        <table class="table table-striped table-bordered">
        <tbody>
        @foreach($paz as $pac)
            <tr>
              <td>Dado el {{ $pac->fecha }}</td>
              <td>En Pereira</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p>Almacen mi chiquitin<p><br/><br/>
    <p>Por medio de la permite se permite validar que {{ $pac->deuda->user->name }} se encuentra a paz y salvo con la deuda No. {{ $pac->id_deuda }} donde realizo el pago por valor de {{ $pac->deuda->valor_a_pagar}}</p>
    <p>Att: Gerencia Mi Chiquitin</p>
  </body>
</html>