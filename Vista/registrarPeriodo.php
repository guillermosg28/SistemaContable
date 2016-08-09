<?php
if (isset($_POST['R_Registrar'])) {
	$nombre = $_POST['r_nombre'];
  $empresa = $_POST['r_empresa'];
  $inicio = $_POST['r_inicio'];
  $fin = $_POST['r_fin'];
  $ingresar =$objPeriodo->Registrar_Periodo($nombre,$empresa,$inicio,$fin);
  echo '<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Mensaje!</strong> Subido correctamente
  </div>';

}
?>
<!-- 5. $SEARCH_RESULTS_PAGE =======================================================================

Search results page
-->

<div class="page-header">
  <h1><i class="fa fa-search page-header-icon"></i>REGISTRAR PERIODO</h1>
</div> <!-- / .page-header -->

<div class="row">
  <div class="col-sm-12">

    <!-- 6. $HORIZONTAL_FORM ===========================================================================

    Horizontal form
  -->
  <form action="" class="panel form-horizontal" method="POST" enctype="multipart/form-data">
    <div class="panel-heading">
      <span class="panel-title">Completar los siguientes datos</span>
    </div>
    <div class="panel-body">
      <div class="col-sm-12">

        <div class="form-group">
          <label class="col-md-2 control-label">Nombre Empresa: </label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="r_nombre" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label">Tipo Empresa: </label>
          <div class="col-md-10">
            <select class="form-control form-group-margin" name="r_empresa" required>
              <?php
              $rs=$objEmpresa->listarTiposEmpresas();
              echo '<option></option>';
              while($dato=$rs->fetchObject()){
                echo '<option value="'.$dato->tiposempresa_codigo.'">'.$dato->tiposempresa_descripcion.'</option>';
              }
              ?>
            </select>
          </div>
        </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Inicio Periodo: </label>
            <div class="col-md-10">
              <input class="form-control" type="date" name="r_inicio" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Fin Periodo: </label>
            <div class="col-md-10">
              <input class="form-control" type="date" name="r_fin" required>
            </div>
          </div>
        </div>

      </div>

    </div>


    <div class="panel-footer text-right">
      <input value="Registrar" name="R_Registrar" class="btn btn-primary" type="submit">
    </div>
  </form>
  <!-- /6. $HORIZONTAL_FORM -->

</div>
</div>
