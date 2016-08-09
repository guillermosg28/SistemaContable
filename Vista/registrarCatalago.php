<?php
if (isset($_POST['guardarCatalago'])) {
  $codigoCuenta = isset($_POST['codigoCuenta']) ? $_POST['codigoCuenta'] : null;
  $ejecutar = $objCatalago->Agregar_Catalago($codigoCuenta,$_SESSION['s_periodo']);
  echo '<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Mensaje!</strong> Registrado correctamente
  </div>';
}
 ?>
<style media="screen">
.listaSeleccionar{
  padding: 0;
  margin: 0;
}
.listaSeleccionar li{
  list-style: none;
  margin-bottom: 3px;
}
.listaSeleccionar li a{
  color: #555;
  font-size: 13px;
}
.listaSeleccionar li a:hover{
  text-decoration: underline;
}
.inputTexto{
  height: 20px;
  margin-top: 5px;
}
</style>
<script type="text/javascript">
function abrirSubCuentas(codigo,nombre){
  $('#cuentaAbierta').toggleClass('collapsed');
  $('#collapseTwo-success').removeClass('in');
  $('#collapseTwo-success').toggleClass('collapse');
  $('#collapseTwo-success').css('height','0');
  $('#codigoCD').html('<div id="codigoCD"><b>Cuenta</b>: '+codigo+'</div>');
  $('#nombreCD').html('<div id="nombreCD"><b>Nombre:</b> '+nombre+'</div>');
  $('#codigoCuenta').val(codigo);
  listarSubCuentas(codigo);
}
function listarSubCuentas(codigo){
  var data="accion=ListarSubCuentasC&cuenta="+codigo+"";
  $.post("Controlador/contCuenta.php", data, function (data_devuelta) {
    $("#listaSubCuentas").html(data_devuelta);
  });
}

function abrirDivisionaria(codigo,nombre){
  $('#subcuentaAbierta').toggleClass('collapsed');
  $('#collapseTwo-danger').removeClass('in');
  $('#collapseTwo-danger').toggleClass('collapse');
  $('#collapseTwo-danger').css('height','0');
  $('#codigoCD').html('<div id="codigoCD"><b>Cuenta</b>: '+codigo+'</div>');
  $('#nombreCD').html('<div id="nombreCD"><b>Nombre:</b> '+nombre+'</div>');
  $('#codigoCuenta').val(codigo);
  listaDivisionarias(codigo);
}
function listaDivisionarias(codigo){
  var data="accion=ListarDivisionariaC&subcuenta="+codigo+"";
  $.post("Controlador/contCuenta.php", data, function (data_devuelta) {
    $("#listarDivisionaria").html(data_devuelta);
  });
}

function abrirSubDivisionaria(codigo,nombre){
  $('#divisionariaAbierta').toggleClass('collapsed');
  $('#collapseTwo-warning').removeClass('in');
  $('#collapseTwo-warning').toggleClass('collapse');
  $('#collapseTwo-warning').css('height','0');
  $('#codigoCD').html('<div id="codigoCD"><b>Cuenta</b>: '+codigo+'</div>');
  $('#nombreCD').html('<div id="nombreCD"><b>Nombre:</b> '+nombre+'</div>');
  $('#codigoCuenta').val(codigo);
  listaSubDivisionarias(codigo);
}
function listaSubDivisionarias(codigo){
  var data="accion=ListarSubDivisionariaC&subcuenta="+codigo+"";
  $.post("Controlador/contCuenta.php", data, function (data_devuelta) {
    $("#listarSubDivisionaria").html(data_devuelta);
  });
}

function abrirFin(codigo,nombre){
  $('#finAbierta').toggleClass('collapsed');
  $('#collapseTwo-info').removeClass('in');
  $('#collapseTwo-info').toggleClass('collapse');
  $('#collapseTwo-info').css('height','0');
  $('#codigoCD').html('<div id="codigoCD"><b>Cuenta</b>: '+codigo+'</div>');
  $('#nombreCD').html('<div id="nombreCD"><b>Nombre:</b> '+nombre+'</div>');
  $('#codigoCuenta').val(codigo);
}
</script>
<div class="page-header">
  <h1><span class="text-light-gray">Catalago / </span>Registrar</h1>
</div> <!-- / .page-header -->


<div class="row">
  <div class="col-sm-12">

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Plan Contable</span>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-6">

            <!-- Success -->
            <div class="panel-group panel-group-success" id="accordion-success-example">

              <div class="panel">
                <div class="panel-heading">
                  <a class="accordion-toggle collapsed" id="cuentaAbierta" data-toggle="collapse" data-parent="#accordion-success-example" href="#collapseTwo-success">
                    CUENTAS
                  </a>
                </div> <!-- / .panel-heading -->
                <div id="collapseTwo-success" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul class="listaSeleccionar">
                      <?php
                      $rs=$objCuenta->listarCuentas("");
                      while($dato=$rs->fetchObject()){
                        echo "<li><a href=\"javascript:void(0);\" onclick=\"abrirSubCuentas('".$dato->cuenta_codigo."','".$dato->cuenta_nombre."');\"><span class=\"badge badge-success\">".$dato->cuenta_codigo."</span> ".$dato->cuenta_nombre."</a></li>";
                      }
                      ?>

                    </ul>
                  </div> <!-- / .panel-body -->
                </div> <!-- / .collapse -->
              </div> <!-- / .panel -->
            </div> <!-- / .panel-group -->
            <!-- / Success -->

          </div>
          <div class="col-sm-6">

            <!-- Danger -->
            <div class="panel-group panel-group-danger" id="accordion-danger-example">

              <div class="panel">
                <div class="panel-heading">
                  <a id="subcuentaAbierta" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-danger-example" href="#collapseTwo-danger">
                    SUBCUENTAS
                  </a>
                </div> <!-- / .panel-heading -->
                <div id="collapseTwo-danger" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul class="listaSeleccionar" id="listaSubCuentas">
                    </ul>
                  </div> <!-- / .panel-body -->
                </div> <!-- / .collapse -->
              </div> <!-- / .panel -->
            </div> <!-- / .panel-group -->
            <!-- / Danger -->

          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">

            <!-- Warning -->
            <div class="panel-group panel-group-warning" id="accordion-warning-example">

              <div class="panel">
                <div class="panel-heading">
                  <a id="divisionariaAbierta" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-warning-example" href="#collapseTwo-warning">
                    DIVISIONARIAS
                  </a>
                </div> <!-- / .panel-heading -->
                <div id="collapseTwo-warning" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul class="listaSeleccionar" id="listarDivisionaria">
                    </ul>
                  </div> <!-- / .panel-body -->
                </div> <!-- / .collapse -->
              </div> <!-- / .panel -->
            </div> <!-- / .panel-group -->
            <!-- / Warning -->

          </div>
          <div class="col-sm-6">

            <!-- Info -->
            <div class="panel-group panel-group-info" id="accordion-info-example">
              <div class="panel">
                <div class="panel-heading">
                  <a id="finAbierta" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-info-example" href="#collapseTwo-info">
                    SUBDIVISIONARIAS
                  </a>
                </div> <!-- / .panel-heading -->
                <div id="collapseTwo-info" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul class="listaSeleccionar" id="listarSubDivisionaria">
                    </ul>
                  </div> <!-- / .panel-body -->
                </div> <!-- / .collapse -->
              </div> <!-- / .panel -->

            </div> <!-- / .panel-group -->
            <!-- / Info -->

          </div>
        </div>
      </div>
    </div>
    <!-- /13. $ACCORDION_COLORS -->

  </div>
</div>


<div class="row">
  <div class="col-sm-6">
    <form  action="" method="POST">


    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Transaccion</span>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <div id="codigoCD"><b>Cuenta</b>: ---</div>
          </div>
          <div class="col-md-12">
            <div id="nombreCD"><b>Nombre:</b> ---</div>
          </div>
          <input type="hidden" id="codigoCuenta" name="codigoCuenta" value="">


        </div>

      </div>

      <div class="panel-footer text-right">
        <input type="submit" name="guardarCatalago" class="btn btn-primary" value="Agregar">
      </div>

    </div>
    </form>
  </div>


</div>
