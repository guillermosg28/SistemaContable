<div class="page-header">
  <h1><span class="text-light-gray">Libro Diario</span></h1>
</div> <!-- / .page-header -->


<?php
if (isset($_POST['verDiarioPeriodo'])) {
?>

<div class="row">
  <div class="col-sm-12">

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Libro Diario - Periodo: <?=$_POST['fechaPeriodo']?></span>
      </div>
      <div class="panel-body">
        <div class="row">

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Asiento</th>
                <th>N° Cuenta</th>
                <th>Cuentas</th>
                <th>Debe</th>
                <th>Haber</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $periodo = 1;
              $rsTransaccion = $objTransaccion->Libro_Diario_Transacciones($_POST['codigoPeriodo']);

              while($datoTransaccion=$rsTransaccion->fetchObject()){
                $rsTotalMovimientos = $objTransaccion->Total_Movimientos_T($datoTransaccion->transaccion_codigo);
                $datoTotalMovimientos=$rsTotalMovimientos->fetchObject();
                $cuadroTd=$datoTotalMovimientos->verificar;
                //MOVIMIENTOS
                $cantidad =1;
                $rsMovimientos = $objTransaccion->Lista_Movimientos($datoTransaccion->transaccion_codigo);
                while($datoMovimiento=$rsMovimientos->fetchObject()){
                  if ($cantidad==1) {
                ?>
                <tr>
									<td align="center" rowspan="<?=$cuadroTd?>">Transaccion <?=$datoTransaccion->transaccion_codigo?></td>
									<td align="center" rowspan="<?=$cuadroTd?>"><?=$datoTransaccion->transaccion_fecha?></td>
                  <td><?=$datoTransaccion->transaccion_asiento?></td>
                  <td><?=$datoMovimiento->cuenta_codigo?></td>
                  <td><?=$datoMovimiento->cuenta_nombre?></td>

                  <?php
                  if($datoMovimiento->movimiento_tipo=="D"){
                  ?>
                  <td align="center"><?=$datoMovimiento->movimiento_monto?></td>
									<td align="center">0</td>
                  <?php
                } else{
                  ?>
                  <td align="center">0</td>
                  <td align="center"><?=$datoMovimiento->movimiento_monto?></td>
                  <?php
                }
                   ?>
								</tr>
                <?php
              } else{
                ?>
                <tr>
                  <td><?=$datoTransaccion->transaccion_asiento?></td>
                  <td><?=$datoMovimiento->cuenta_codigo?></td>
									<td><?=$datoMovimiento->cuenta_nombre?></td>
                  <?php
                  if($datoMovimiento->movimiento_tipo=="D"){
                  ?>
                  <td align="center"><?=$datoMovimiento->movimiento_monto?></td>
									<td align="center">0</td>
                  <?php
                } else{
                  ?>
                  <td align="center">0</td>
                  <td align="center"><?=$datoMovimiento->movimiento_monto?></td>
                  <?php
                }
                   ?>

								</tr>

              <?php
              }
              $cantidad++;

                }
                echo "<td align=\"center\" colspan=\"7\">".$datoTransaccion->transaccion_nombre."</td>";
              } ?>



            </tbody>
          </table>


        </div>

      </div>

    </div>
  </div>


<?php }else{
?>

  <div class="row">
    <div class="col-sm-12">

      <div class="panel">
        <form  action="" method="POST">
        <div class="panel-heading">
          <span class="panel-title">Libro Diario</span>
        </div>
        <div class="panel-body">
          <div class="row">

            <div class="col-md-2">
              <label class="form-control">Periodo: </label>
            </div>
            <div class="col-md-4">
              <select class="form-control" name="codigoPeriodo">
                <option>Seleccione Periodo</option>
                <?php
                $rsPeriodo = $objPeriodo->Listar_Periodos();
                while ($datoPeriodo=$rsPeriodo->fetchObject()) {
                 echo "<option value=\"".$datoPeriodo->periodo_codigo."\">[".$datoPeriodo->periodo_codigo."] ".str_replace("-","/",$datoPeriodo->periodo_inicio)." - ".str_replace("-","/",$datoPeriodo->periodo_fin)."</option>";
                 echo "<input type=\"hidden\" name=\"fechaPeriodo\" value=\"[".$datoPeriodo->periodo_codigo."] ".str_replace("-","/",$datoPeriodo->periodo_inicio)." - ".str_replace("-","/",$datoPeriodo->periodo_fin)."\">";
                }
                 ?>
              </select>

            </div>


          </div>

        </div>

        <div class="panel-footer text-right">
          <input type="submit" name="verDiarioPeriodo" class="btn btn-primary" value="Ver">
        </div>

        </form>
      </div>
    </div>


</div>
<?php } ?>
