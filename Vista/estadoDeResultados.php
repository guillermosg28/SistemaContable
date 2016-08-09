
<div class="page-header">
  <h1><span class="text-light-gray">Estado de Resultados</span></h1>
</div> <!-- / .page-header -->



<div class="row">
  <div class="col-sm-12">

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Estado de Resultados</span>
      </div>
      <div class="panel-body">
        <div class="row">
          <table class="table">
            <thead>
              <tr>
                <th>Nombre Cuenta</th>
                <th>Debe</th>
                <th>Haber</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $finTotalHaber =0;
              $finTotalDebe=0;
              $datoCatalago = $objCatalago->Listar_Catalagos_Resultados();
              echo '<tr><td><b>Ingresos</b></td><td></td></tr>';
              foreach ($datoCatalago as $rowC):
                ?>
                <?php if ($rowC['elemento_codigo']==7): ?>
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

                    if ($totalDebe>$totalHaber) {
                      $finTotal = $totalDebe-$totalHaber;
                      $tipoFin = "D";
                    }else{
                      $finTotal = $totalHaber-$totalDebe;
                      $tipoFin = "H";
                    }

                  }


                  //AJUSTES
                  $rsAjustes=$objAjustes->verificar_Ajustes($rowC['cuenta_codigo']);
                  $dataAjustes=$rsAjustes->fetchObject();
                  if ($dataAjustes->verificar) {
                    $rsAjustesM=$objAjustes->cuenta_Ajustes($rowC['cuenta_codigo']);
                    $dataAjustesM=$rsAjustesM->fetchObject();

                    if ($dataAjustesM->ajuste_tipo=="D") {
                      $finTotal=$finTotal+$dataAjustesM->ajuste_monto;
                    }else{
                      $finTotal=$finTotal-$dataAjustesM->ajuste_monto;
                    }
                  }else{
                  }
                   ?>


                <tr>

                  <td>[<?=$rowC['cuenta_codigo']?>] <?=$rowC['cuenta_nombre']?></td>
                  <?php
                  if ($tipoFin=="D") {
                    echo "<td>".$finTotal."</td><td></td>";
                  }
                  if ($tipoFin=="H") {
                    echo "<td></td><td>".$finTotal."</td>";
                  }
                   ?>
                <tr>
                  <?php endif; ?>


                  <!--- GASTOS -->
                  <?php if ($rowC['elemento_codigo']==6): ?>
                    <?php
                    echo '<tr><td><b>Gastos</b></td><td></td><td></td></tr>';
                    $totalHaberG=0;
                    $totalDebeG=0;

                    $rsTransaccionG = $objTransaccion->Lista_Movimiento_Mayor($rowC['cuenta_codigo']);
                    $tipoFinG="V";
                    while($datoTransaccionG=$rsTransaccionG->fetchObject()){

                      if($datoTransaccionG->movimiento_tipo=="D") {
                        $totalDebeG=$totalDebeG+$datoTransaccionG->movimiento_monto;
                      }
                      if ($datoTransaccionG->movimiento_tipo=="H") {
                        $totalHaberG=$totalHaberG+$datoTransaccionG->movimiento_monto;
                      }



                      if ($totalDebeG>$totalHaberG) {
                        $finTotalG = $totalDebeG-$totalHaberG;
                        $tipoFinG = "D";
                      }else{
                        $finTotalG = $totalHaberG-$totalDebeG;
                        $tipoFinG = "H";
                      }

                    }


                    //AJUSTES
                    $rsAjustesG=$objAjustes->verificar_Ajustes($rowC['cuenta_codigo']);
                    $dataAjustesG=$rsAjustesG->fetchObject();
                    if ($dataAjustesG->verificar) {
                      $rsAjustesMG=$objAjustes->cuenta_Ajustes($rowC['cuenta_codigo']);
                      $dataAjustesMG=$rsAjustesMG->fetchObject();

                      if ($dataAjustesMG->ajuste_tipo=="D") {
                        $finTotalG=$finTotalG+$dataAjustesMG->ajuste_monto;
                      }else{
                        $finTotalG=$finTotalG-$dataAjustesMG->ajuste_monto;
                      }
                    }else{
                    }
                     ?>


                  <tr>

                    <td>[<?=$rowC['cuenta_codigo']?>] <?=$rowC['cuenta_nombre']?></td>
                    <?php
                    if ($tipoFinG=="D") {
                      echo "<td>".$finTotalG."</td><td></td>";
                    }
                    if ($tipoFinG=="H") {
                      echo "<td></td><td>".$finTotalG."</td>";
                    }
                    if ($tipoFinG=="V") {
                      echo "<td></td><td></td>";
                    }
                     ?>
                  <tr>
                    <?php endif; ?>



                  <?php endforeach ?>
              </tbody>
            </table>
        </div>

      </div>

    </div>
  </div>


</div>

<script type="text/javascript">
  function eliminarCuenta(codigo){
    $("#cuenta_"+codigo+"").remove();
    eliminarCuentaBD(codigo);
  }
  function eliminarCuentaBD(codigo){
    var data="accion=eliminarCuenta&codigo="+codigo+"";
    $.post("Controlador/contCuenta.php",data);
  }
</script>
