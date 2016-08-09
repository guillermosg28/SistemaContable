<?php
if (isset($_POST['R_Registrar'])) {
  $permisos = "";
	$usuario = $_POST['u_usuario'];
	$contrasena = $_POST['u_contrasena'];

  $plancontable = $_POST['u_plancontable'];
	$catalago = $_POST['u_catalago'];
	$permisos = "";
	if (!$slider==NULL) {
    
		$permisos = $permisos . $slider.",";
	}
	if (!$agenda==NULL) {
		$permisos = $permisos . $agenda.",";
	}


	//$ingresar =$usuariosql->Registrar_Usuario($usuario,$contrasena,$permisos);
	echo '<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>Mensaje!</strong> Usuario registrado orrectamente
	</div>';
}
?>


<div class="page-header">
  <h1><span class="text-light-gray">Registrar Usuario</span></h1>
</div> <!-- / .page-header -->

<div class="row">
  <div class="col-sm-12">
    <form action="" class="panel form-horizontal" method="POST" >


    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Complete los siguientes campos</span>
      </div>
      <div class="panel-body">
        <div class="row">

          <div class="col-sm-12">

    				<div class="form-group">
    					<label class="col-md-2 control-label" for="select-1">Usuario: </label>
    					<div class="col-md-10">
    						<input class="form-control" type="text" name="u_usuario" required placeholder="Nombre Usuario">
    					</div>
    				</div>

    				<div class="form-group">
    					<label class="col-md-2 control-label" for="select-1">Contraseña: </label>
    					<div class="col-md-10">
    						<input class="form-control" type="text" name="u_contrasena" required placeholder="Ingrese contraseña">
    					</div>
    				</div>

    				<div class="form-group">
    					<label class="col-md-2 control-label" for="select-1">Permisos: </label>
    					<div class="col-md-10">
                <?php
                $rsPermiso= $objUsuario->listarPermisos();
                while ($datoPermiso=$rsPermiso->fetchObject()) {
                ?>
                <label class="checkbox">
    							<input type="checkbox" value="<?=$datoPermiso->usuariospermisos_codigo?>" name="u<?=$datoPermiso->usuariospermisos_codigo?>">
    							<?=$datoPermiso->usuariospermisos_nombre?>
    						</label>
                <?php
                }
                 ?>
    					</div>
    				</div>

    			</div>


        </div>

      </div>

      <div class="panel-footer text-right">
        <input value="Registrar" name="R_Registrar" class="btn btn-primary" type="submit">
      </div>
      </form>
    </div>
  </div>
