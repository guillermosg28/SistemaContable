
<div class="page-header">
  <h1><span class="text-light-gray">Balanza de Comprobación Ajustada</span></h1>
</div> <!-- / .page-header -->



<div class="row">
  <div class="col-sm-12">

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Balanza de Comprobación Ajustada</span>
      </div>
      <div class="panel-body">
        <div class="row">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>N° Cuenta</th>
                <th>Cuentas</th>
                <th>Saldo antes de ajustes</th>
                <th>Ajustes</th>
                <th>Saldo Ajustado</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $finTotalHaber =0;
              $finTotalDebe=0;
              $datoCatalago = $objCatalago->Listar_Catalagos();
              foreach ($datoCatalago as $rowC):
                ?>
                <tr id="cuenta_<?=$rowC['catalago_codigo']?>">
                  <td><?=$rowC['cuenta_codigo']?></td>
                  <td><?=$rowC['cuenta_nombre']?></td>
                  <?php
                  $totalHaber=0;
                  $totalDebe=0;

                  $rsTransaccion = $objTransaccion->Lista_Movimiento_Mayor($rowC['cuenta_codigo']);
                  while($datoTransaccion=$rsTransaccion->fetchObject()){
                    if($datoTransaccion->movimiento_tipo=="D") {
                      $totalDebe=$totalDebe+$datoTransaccion->movimiento_monto;
                    }
                    if ($datoTransaccion->movimiento_tipo=="H") {
                      $totalHaber=$totalHaber+$datoTransaccion->movimiento_monto;
                    }

                    //FINAL CALCULO
                    if ($totalDebe>$totalHaber) {
                      $finTotal = $totalDebe-$totalHaber;
                      $tipoFin = "D";

                    }else{
                      $finTotal = $totalHaber-$totalDebe;
                      $tipoFin = "H";
                    }
                  }
                  //IMPRESION FINAL

                  if($tipoFin=="D") {
                    $finTotalDebe=$finTotal+$finTotalDebe;
                    echo "<td>".$finTotal."</td>";
                  }

                  if($tipoFin=="H") {
                    $finTotalHaber=$finTotal+$finTotalHaber;
                    echo "<td>".$finTotal."</td>";
                  }

                   ?>
                <tr>
                  <?php endforeach ?>
                  <tr>
                    <td></td>
                    <td>Saldo Final</td>
                    <td><?=$finTotalDebe?></td>
                    <td><?=$finTotalHaber?></td>

                  </tr>
              </tbody>
            </table>
        </div>

      </div>

    </div>
  </div>


</div>
