<div class="page-header">
  <h1><span class="text-light-gray">Libro Mayor</span></h1>
</div> <!-- / .page-header -->


<?php
if (isset($_POST['verMayor'])) {
?>

<div class="row">
  <div class="col-sm-12">

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">LIBRO MAYOR</span>
      </div>
      <div class="panel-body">
        <div class="row">

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Fecha</th>
                <th>Referencia</th>
                <th>Debe</th>
                <th>Haber</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $totalHaber=0;
              $totalDebe=0;
              $rsTransaccion = $objTransaccion->Lista_Movimiento_Mayor($_POST['codigoCuenta']);
              while($datoTransaccion=$rsTransaccion->fetchObject()){
              ?>
              <tr>
              <td><?=$datoTransaccion->transaccion_fecha?></td>
              <td>Transaccion N° <?=$datoTransaccion->transaccion_codigo?></td>
              <?php
              if ($datoTransaccion->movimiento_tipo=="D") {
                $totalDebe=$totalDebe+$datoTransaccion->movimiento_monto;
              ?>
              <td align="center"><?=$datoTransaccion->movimiento_monto?></td>
              <td></td>
              <?php }
              if ($datoTransaccion->movimiento_tipo=="H") {
                $totalHaber=$totalHaber+$datoTransaccion->movimiento_monto;
              ?>
              <td></td>
              <td align="center"><?=$datoTransaccion->movimiento_monto?></td>

              <?php }
              ?>

              </tr>

              <?php }
              if ($totalDebe>$totalHaber) {
                $finTotal = $totalDebe-$totalHaber;
              ?>
              <tr>
                <td></td>
                <td>Saldo antes de ajustes</td>
                <td align="center"><?=$finTotal?></td>
                <td align="center"></td>
              </tr>
              <?php
            }else{
              $finTotal = $totalHaber-$totalDebe;
              ?>
              <tr>
                <td></td>
                <td>Saldo antes de ajustes</td>
                <td align="center">---</td>
                <td align="center"><?=$finTotal?></td>

              </tr>
            <?php
            }


               ?>


            </tbody>
          </table>


        </div>

      </div>

      <div class="panel-footer text-right">
        <a class="btn btn-primary" href="libroMayor">Regresar</a>
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
          <span class="panel-title">Catalago</span>
        </div>
        <div class="panel-body">
          <div class="row">

            <div class="col-md-2">
              <label class="form-control">Cuenta: </label>
            </div>
            <div class="col-md-4">
              <select class="form-control" name="codigoCuenta">
                <option>Seleccione Cuenta</option>
                <?php
                $rsCatalago = $objCatalago->Listar_Catalagos();
                while ($datoCatalago=$rsCatalago->fetchObject()) {
                 echo "<option value=\"".$datoCatalago->cuenta_codigo."\">[".$datoCatalago->cuenta_codigo."] ".$datoCatalago->cuenta_nombre."</option>";
                }
                 ?>
              </select>

            </div>


          </div>

        </div>

        <div class="panel-footer text-right">
          <input type="submit" name="verMayor" class="btn btn-primary" value="Ver">
        </div>

        </form>
      </div>
    </div>


</div>
<?php } ?>
