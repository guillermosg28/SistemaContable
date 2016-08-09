<?php
if (isset($_POST['R_Registrar'])) {
	$subdivisionaria = $_POST['r_subdivisionaria'];
	$codigo = $_POST['r_codigo'];
	$nombre = $_POST['r_nombre'];
	$rsVerificaCodigo=$objCuenta->verificar_Codigo($codigo);
	$datoVerificarCodigo=$rsVerificaCodigo->fetchObject();
	if ($datoVerificarCodigo->verificar==0) {
		$ingresar =$objCuenta->Registrar_SubDivsionaria($subdivisionaria,$codigo,$nombre);
	  echo '<div class="alert alert-success">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  <strong>Mensaje!</strong> Subido correctamente
	  </div>';
	}else{
	  echo '<div class="alert alert-danger">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  <strong>Mensaje!</strong> Codigo ya existe
	  </div>';
	}


}
?>
<!-- 5. $SEARCH_RESULTS_PAGE =======================================================================

Search results page
-->

<div class="page-header">
  <h1><i class="fa fa-search page-header-icon"></i>REGISTRAR SUBDIVISIONARIA</h1>
</div> <!-- / .page-header -->

<div class="row">
  <div class="col-sm-12">

    <!-- 6. $HORIZONTAL_FORM ===========================================================================

    Horizontal form
  -->
  <form action="" name="formularioSubCuenta" class="panel form-horizontal" method="POST" enctype="multipart/form-data">
    <div class="panel-heading">
      <span class="panel-title">Completar los siguientes datos</span>
    </div>
    <div class="panel-body">
      <div class="col-sm-12">

				<div class="form-group">
          <label class="col-md-2 control-label">Tipo: </label>
          <div class="col-md-10">
						<select class="form-control form-group-margin" name="r_tipo" id="selectTipo" required>
            </select>
          </div>
				</div>

				<div class="form-group">
          <label class="col-md-2 control-label">Cuenta: </label>
          <div class="col-md-10">
						<select class="form-control form-group-margin" name="r_cuenta" id="selectCuenta" required disabled="disabled">
            </select>
          </div>
				</div>

				<div class="form-group">
          <label class="col-md-2 control-label">SubCuenta: </label>
          <div class="col-md-10">
						<select class="form-control form-group-margin" name="r_subcuenta" id="selectSubCuenta" required disabled="disabled">
            </select>
          </div>
				</div>

				<div class="form-group">
          <label class="col-md-2 control-label">Divisionaria: </label>
          <div class="col-md-10">
						<select class="form-control form-group-margin" name="r_subdivisionaria" id="selectDivisionaria" required disabled="disabled">
            </select>
          </div>
				</div>

				<div class="form-group">
          <label class="col-md-2 control-label">Codigo: </label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="r_codigo" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label">Nombre: </label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="r_nombre" required>
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
