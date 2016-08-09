
<div class="page-header">
  <h1><span class="text-light-gray">ESTADO DE SITUACIÓN FINANCIERA</span></h1>
</div> <!-- / .page-header -->



<div class="row">
  <div class="col-sm-12">

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">ACTIVO</span>
      </div>
      <div class="panel-body">
        <div class="row">
          <table class="table">
            <thead>
              <tr>
                <th colspan="3"><b>ACTIVO CIRCULANTE</b></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $finTotalHaber =0;
              $finTotalDebe=0;
              $totalAC = 0;
              $datoCatalago = $objCatalago->Listar_Catalagos_Resultados();
              foreach ($datoCatalago as $rowC):
                ?>
                <?php if ($rowC['elemento_codigo']==1 || $rowC['elemento_codigo']==2): ?>
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
                    $totalAC=$totalAC+$finTotal;
                    echo "<td>".$finTotal."</td><td></td>";
                  }
                  if ($tipoFin=="H") {
                    $totalAC=$totalAC+$finTotal;
                    echo "<td>".$finTotal."</td><td></td>";
                  }
                   ?>
                </tr>
                  <?php endif; ?>
                  <?php endforeach ?>
                  <tr>
                    <td>Total Activo Circulante</td>
                    <td></td>
                    <td><?=$totalAC?></td>
                  </tr>
              </tbody>
            </table>


            <table class="table">
              <thead>
                <tr>
                  <th colspan="3"><b>ACTIVO FIJO</b></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $finTotalHaber =0;
                $finTotalDebe=0;
                $totalAC = 0;
                $datoCatalago = $objCatalago->Listar_Catalagos_Resultados();
                foreach ($datoCatalago as $rowC):
                  ?>
                  <?php if ($rowC['elemento_codigo']==3): ?>
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
                      $totalAC=$totalAC+$finTotal;
                      echo "<td>".$finTotal."</td><td></td>";
                    }
                    if ($tipoFin=="H") {
                      $totalAC=$totalAC+$finTotal;
                      echo "<td>".$finTotal."</td><td></td>";
                    }
                     ?>
                  </tr>
                    <?php endif; ?>
                    <?php endforeach ?>
                    <tr>
                      <td>Total Activo Circulante</td>
                      <td></td>
                      <td><?=$totalAC?></td>
                    </tr>
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
