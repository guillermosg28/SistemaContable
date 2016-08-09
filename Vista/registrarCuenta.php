<?php
if (isset($_POST['R_Registrar'])) {
	$codigo = $_POST['r_codigo'];
	$nombre = $_POST['r_nombre'];
  $tipo = $_POST['r_tipo'];
  $ingresar =$objCuenta->Registrar_Cuenta($codigo,$nombre,$tipo);
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
  <h1><i class="fa fa-search page-header-icon"></i>REGISTRAR CUENTA</h1>
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
          <label class="col-md-2 control-label">Tipo: </label>
          <div class="col-md-10">
            <select class="form-control form-group-margin" name="r_tipo" required>
              <?php
              $rs=$objElemento->listarElementos();
              echo '<option></option>';
              while($dato=$rs->fetchObject()){
                echo '<option value="'.$dato->elemento_codigo.'">['.$dato->elemento_codigo.'] '.$dato->elemento_descripcion.'</option>';
              }
              ?>
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
